<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Models\Category;
use App\Models\Chair;
use App\Models\Invitation;
use App\Models\NickeName;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class InvitationController extends Controller
{

    public function index()
    {
        return view('invitation.index');
    }
    public function all()
    {
        return view('invitation.all');
    }

    public function fetch()
    {
        $nks = NickeName::all();
        $invitations=Invitation::where('invitation_status',1)->get();
        $categories=Category::all();
        return response()->json([
            'nks' => $nks,
            'categories' => $categories,
            'invitations' => $invitations,
        ]);
    }
    public function fetch_all()
    {
        $invitations = Invitation::with('category','chair')->get();
        $chairs=Chair::where('condition','1')->get();
        return response()->json([
            'chairs' => $chairs,
            'invitations' => $invitations,
        ]);
    }
    public function fetch_external()
    {
        $nks = NickeName::all();
        $invitations=Invitation::where('invitation_status',2)->get();
        $categories=Category::all();
        return response()->json([
            'nks' => $nks,
            'categories' => $categories,
            'invitations' => $invitations,
        ]);
    }
    public function edit_order($id)
    {
        $invitation = Invitation::with('category','nk')->where('id',$id)->first();
        if ($invitation) {
            return response()->json([
                'invitation' => $invitation
            ]);
        } else {
            return response()->json([
                'message' => 'be sure of your data',
            ]);
        }
    }

    public function external()
    {
        return view('invitation.external');
    }
    public function form()
    {
        $nks = NickeName::all();
        return view('invitation.form',compact('nks'));
    }


    public function store(InvitationRequest $request)
    {
        $validated = $request->validated();

        $inv = new Invitation();
        $inv->name = $request->name;
        $inv->email1 = $request->email1;
        $inv->email2 = $request->email2;
        $inv->organization = $request->organization;
        $inv->mobile = $request->mobile;
        $inv->invitation_status = $request->invitation_status;
        $inv->invitation_type_email = (int)$request->invitation_type_email;
        $inv->invitation_type_mobile =(int)$request->invitation_type_mobile;
        $inv->order_status = $request->order_status;
        $inv->job = $request->job;
        $inv->is_attended = $request->is_attended;
        $inv->nick_id = $request->nick_id;
        $inv->category_id = $request->category_id;
        $inv->chair_id = $request->chair_id;



        $inv->save();

        return response()->json([
            'message' => 'تم اضافة السجل/ تحديث السجل',
        ]);
    }

    public function edit($id)
    {
        $invitation = Invitation::find($id);
        return view('invitation.confirm',compact('invitation'));
    }

    public function update(UpdateInvitationRequest $request, $id)
    {
        $validated = $request->validated();

        $inv = Invitation::find($id);
        $inv->name = $request->name;
        $inv->email1 = $request->email1;
        $inv->organization = $request->organization;
        $inv->mobile = $request->mobile;
        $inv->job = $request->job;
        $inv->order_status = $request->order_status;
        $inv->update();

        return response()->json([
            'message' => 'your data were updated successfully',
        ]);
    }
    public function update_status(UpdateInvitationRequest $request,$id)
    {
        $inv = Invitation::find($id);
        $inv->name = $request->name;
        $inv->email1 = $request->email1;
        $inv->order_status = $request->order_status;
        $inv->update();

        return response()->json([
            'message' => 'your data were updated successfully',
        ]);
    }
    public function update_chair(Request $request,$id)
    {
        $inv = Invitation::find($id);
        $inv->chair_id = $request->chair_id;
        $inv->update();

        return response()->json([
            'message' => 'your data were updated successfully',
        ]);
    }

    public function store_form(InvitationRequest $request)
    {
        $validated = $request->validated();

        $inv = new Invitation();
        $inv->name = $request->name;
        $inv->email1 = $request->email1;
        $inv->email2 = $request->email2;
        $inv->organization = $request->organization;
        $inv->mobile = $request->mobile;
        $inv->invitation_status = $request->invitation_status;
        $inv->invitation_type_email = (int)$request->invitation_type_email;
        $inv->invitation_type_mobile =(int)$request->invitation_type_mobile;
        $inv->order_status = $request->order_status;
        $inv->job = $request->job;
        $inv->is_attended = $request->is_attended;
        $inv->nick_id = $request->nick_id;
        $inv->category_id = $request->category_id;
        $inv->chair_id = $request->chair_id;

        $inv->save();

        return response()->json([
            'message' => 'تم استلام طلبكم بنجاح, وسيتم التواصل معكم لتأكيد حالة التسجيل قريباً',
        ]);
    }
}
