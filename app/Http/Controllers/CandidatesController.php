<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Http\Requests\StoreCandidatesRequest;
use App\Http\Requests\UpdateCandidatesRequest;
use App\Models\SkillSets;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidatesController extends Controller
{
    private $erCode = 200;
    private $errMessage;
    private $data;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'nama_lengkap' => 'string|max:100|required',
                'jabatan' => 'required|integer|max:10',
                'telepon' => 'string|max:15|required',
                'email' => 'required|email',
                'tahun_lahir' => 'required|integer',
                'skills_set' => 'required|string'
            ]
            );
        if($validate->fails()){
            $this->erCode = 400;
            $this->errMessage = $validate->errors();
        }
        
        $telepon = $request->telepon;
        $nama = $request->nama_lengkap;
        $email = $request->email;
        $tahun_lahir = $request->tahun_lahir;
        $skills_set = $request->skills_set;
        $jabatan = $request->jabatan;

        if($this->erCode == 200){
            $cekTelpon = Candidates::where('phone', $telepon)->first();
            if($cekTelpon){
                $this->erCode = 400;
                $this->errMessage = "Telpon sudah terdaftar";
            }
            $cekEmail = Candidates::where('email', $email)->first(); 
            if($cekEmail){
                $this->erCode = 400;
                $this->errMessage = "Email sudah terdaftar";
            }

        }
        // dd(explode(',',$skills_set));
        if($this->erCode == 200){
            try{
                $candidates = new Candidates();
                $candidates->phone = $telepon;
                $candidates->job_id = $jabatan;
                $candidates->name = $nama;
                $candidates->email = $email;
                $candidates->year = $tahun_lahir;
                $candidates->created_by = 1;
                $candidatesRes = $candidates->save();
                // Insert into skill set if sukses insert to candidate
                if($candidatesRes){
                    $candidate_id = $candidates->id;
                    $skillsSetsArray = explode(',',$skills_set);
                    for($row = 0; $row <= count($skillsSetsArray)-1; $row+=1){
                        $skillSetModel = new SkillSets();
                        $skillSetModel->candidate_id = $candidate_id;
                        $skillSetModel->skill_id = $skillsSetsArray[$row];
                        $skillSetModel->save();
                    }
                }

                $this->errMessage = "Berhasil Menambah Data";
            }catch(Exception $e){
                $this->erCode = 500;
                $this->errMessage = $e;
            }
        }

        $response = [
            'errMessages' => $this->errMessage,
            'data' => $this->data
        ];
        return response()->json($response, $this->erCode);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidatesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidates $candidates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidates $candidates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatesRequest $request, Candidates $candidates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidates $candidates)
    {
        //
    }
}
