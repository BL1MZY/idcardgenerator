<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class CompleteRegistration extends Component
{
    use WithFileUploads;
    public $student_id;
    public $photo;
    public $sn;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $course;
    public $department;
    public $nationality;
    public $user;
    public $status;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->department = Auth::user()->department;
        $this->nationality = Auth::user()->nationality;
        $this->course = Auth::user()->course;
        $this->address = Auth::user()->address;
        $this->student_id = Auth::user()->student_id;
        $this->sn = Auth::user()->sn;
        $this->status = Auth::user()->status;
    }
    public function render()
    {
        return $this->status==="Approved"? view('livewire.download'):view('livewire.complete-registration');
    }

    public function generateUniqueSerial()
    {
        $prefix = 'LNC';
        $suffix = strtoupper(date('M'));
        $totalLength = 10;
        $randomNumberLength = $totalLength - strlen($prefix) - strlen($suffix);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomPart = '';
        for ($i = 0; $i < $randomNumberLength; $i++) {
            $randomPart .= $characters[rand(0, strlen($characters) - 1)];
        }

        $serialNumber = $prefix . $randomPart . $suffix;

        return $serialNumber;
    }
    public function download()
    {
        $user = Auth::user(); 
        $html = view('id_card', compact('user'))->render(); 
        return PDF::loadHTML($html)->download('id_card.pdf');
    }

    public function rules()
    {
        return [
            "student_id" => "required",
            "photo" => "required",
            "sn" => "required",
            "name" => "required",
            "phone" => "required",
            "email" => "required",
            "address" => "required",
            "course" => "required",
            "department" => "required",
            "nationality" => "required",
        ];
    }
    public function create()
    {
        $this->sn = $this->generateUniqueSerial();
        $this->validate();
        if ($this->photo) {
            $imageName = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('uploads', $imageName, 'public');
         
            $this->photo = asset('/storage/uploads/'.$imageName) ;
        }

        $this->status = "Pending";

        $this->user->update($this->only([
            'student_id',
            'photo',
            'name',
            'phone',
            'course',
            'department',
            'nationality',
            'address',
            'email',
            'status',
        ]));

        $message = "Hello guys";
        $email = base64_encode($this->email);
        try {
            // Mail::to($this->email)->send(new welcomemail("Cowa Membership Confirmation", $message, $user));
        } catch (\Exception $e) {
            // Log::error("message", $e->getMessage());
        } finally {
            $this->redirectRoute('complete', $email);
        }
    }
}
