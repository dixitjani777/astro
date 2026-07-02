<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtpDeliveryLog;
use Illuminate\Http\Request;

class OtpDeliveryLogsController extends Controller
{
    public function index(Request $request)
    {
        $query = OtpDeliveryLog::query()
            ->with('user')
            ->latest();

        if ($request->filled('purpose')) {
            $query->where('purpose', $request->string('purpose'));
        }

        if ($request->filled('channel')) {
            $query->where('channel', $request->string('channel'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('recipient')) {
            $query->where('recipient', 'like', '%' . $request->string('recipient') . '%');
        }

        return view('admin.otp-delivery-logs.index', [
            'logs' => $query->paginate(50)->withQueryString(),
        ]);
    }

    public function show(OtpDeliveryLog $otp_delivery_log)
    {
        $otp_delivery_log->load('user');

        return view('admin.otp-delivery-logs.show', [
            'log' => $otp_delivery_log,
        ]);
    }
}
