<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrganizationProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOrganizationProfile($id)
    {

       
       $org_page=DB::table('Add_organizations')->where(['company_id'=> $id])->first();
       $org_post=DB::table('organization_posts')->where(['company_id'=> $id])->get();
       if($org_page){
        return view('admin_views/Organization_views/organization_profile',['org_page'=>$org_page,'org_post'=>$org_post]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doCompanyPost(Request $request){
        echo "asad";
        $current_date = date("Y.m.d h:i:s");
        $job_post= array(
            'company_id' => $request->post('x'),
            'org_contact_phone' => $request->post('a'), 
            'org_contact_email' => $request->post('b'), 
            'posted_job_title' => $request->post('c'), 
            'career_level' => $request->post('d'), 
            'job_experience' => $request->post('e'), 
            'job_salary' => $request->post('f'), 
            'job_skills' => $request->post('g'), 
            'job_tags' => $request->post('h'), 
            'gender_preferences' => $request->post('i'), 
            'job_info' => $request->post('j'), 
            'created_at' => $current_date,
            'updated_at' => $current_date
        );
        if(DB::table('organization_posts')->insert($job_post)){
            echo "yes";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteOrgPost(Request $request)
    {
       $id= $request->post('id');
         if(DB::table('organization_posts')->where(['post_id' => $id])->delete()){
          echo "yes";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
