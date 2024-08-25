<?php

namespace App\Http\Controllers\Api;

use App\Models\Deposit;
use App\Constants\Status;
use App\Models\SendMoney;
use Illuminate\Http\Request;
use App\Models\GatewayCurrency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function methods()
    {
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();
        $notify[] = 'Payment Methods';
        return response()->json([
            'remark' => 'payment_methods',
            'message' => ['success' => $notify],
            'data' => [
                'methods' => $gatewayCurrency,
                'image_path' => getFilePath('gateway')
            ],
        ]);
    }

    public function depositInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|gt:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'remark' => 'validation_error',
                'status' => 'error',
                'message' => ['error' => $validator->errors()->all()],
            ]);
        }

        $user = auth()->user();
        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->where('method_code', $request->method_code)
            ->where('currency', $request->currency)
            ->first();
        if (!$gate) {
            $notify[] = 'Invalid gateway';
            return response()->json([
                'remark' => 'validation_error',
                'status' => 'error',
                'message' => ['error' => $notify],
            ]);
        }

        $data = new Deposit();

        if ($user) {
            $sendMoney = SendMoney::where('trx', $request->trx)
                ->where('user_id', $user->id)
                ->with('deposit', 'sendingCountry:id,rate')
                ->first();
            if (!$sendMoney) {
                $notify[] = 'Send money Not Found';
                return response()->json([
                    'remark' => 'send_money',
                    'status' => 'error',
                    'message' => ['error' => $notify],
                ]);
            }

            $amount = $sendMoney->base_currency_amount + $sendMoney->base_currency_charge;
            if ($gate->min_amount > $amount || $gate->max_amount < $amount) {
                $notify[] =  'Please follow gateway limit';
                return response()->json([
                    'remark' => 'validation_error',
                    'status' => 'error',
                    'message' => ['error' => $notify],
                ]);
            }

            $rate = $sendMoney->sendingCountry->rate;
            if ($sendMoney->deposit) {
                $data = $sendMoney->deposit;
            }

            if ($sendMoney->payment_status != Status::PAYMENT_INITIATE && $sendMoney->payment_status != Status::PAYMENT_REJECT) {
                $notify[] = 'Send-money is already completed';
                return response()->json([
                    'remark' => 'send_money_error',
                    'status' => 'error',
                    'message' => ['error' => $notify],
                ]);
            }

            $data->user_id = $user->id;
            $data->trx = $request->trx;
            $data->send_money_id = $sendMoney->id;
        }

        $charge = $gate->fixed_charge + ($amount * $gate->percent_charge / 100);
        $payable = $amount + $charge;
        $finalAmount = $payable * $rate;

        $data->from_api = 1;
        $data->method_code = $gate->method_code;
        $data->method_currency = strtoupper($gate->currency);
        $data->amount = $amount;
        $data->charge = $charge;
        $data->rate = $rate;
        $data->final_amount = $finalAmount;
        $data->btc_amount = 0;
        $data->btc_wallet = "";
        $data->payment_try = 0;
        $data->status = 0;
        $data->success_url = urlPath('user.send.money.history');
        $data->failed_url = urlPath('user.send.money.history');
        $data->save();

        $notify[] =  'Payment inserted';
        return response()->json([
            'remark' => 'payment_inserted',
            'status' => 'success',
            'message' => ['success' => $notify],
            'data' => [
                'deposit' => $data,
                'redirect_url' => route('deposit.app.confirm', encrypt($data->id))
            ]
        ]);
    }
}
