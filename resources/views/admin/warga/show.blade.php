@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.history_warga.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                <th>
                            {{ trans('global.warga.fields.warga_no_ktp') }}
                        </th>
                        <td>
                            {{ $warga->warga_no_ktp ?? '' }}
                        </td>
                        </tr>

                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_no_kk') }}
                        </th>
                        <td>
                            {{ $warga->warga_no_kk ?? '' }}
                        </td>
                        </tr>

                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_first_name') }}
                        </th>
                        <td>
                            {{ $warga->warga_first_name ?? '' }}
                        </td>
                       </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_last_name') }}
                        </th>
                        <td>
                            {{ $warga->warga_last_name ?? '' }}
                        </td>
                       </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_sex') }}
                        </th>
                        <td>
                            {{ $warga->warga_sex ?? '' }}
                        </td>
                       </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_religion') }}
                        </th>
                        <td>
                            {{ $warga->warga_religion ?? '' }}
                        </td>
                       </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_address') }}
                        </th>
                        <td>
                            {{ $warga->warga_address ?? '' }}
                        </td>
                        </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_address_code') }}
                        </th>
                        <td>
                            {{ $warga->warga_address_code ?? '' }}
                        </td>
                        </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_job') }}
                        </th>
                        <td>
                            {{ $warga->warga_job ?? '' }}
                        </td>
                        </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_salary_range') }}
                        </th>
                        <td>
                            {{ $warga->warga_salary_range ?? '' }}
                        </td>
                       </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_phone') }}
                        </th>
                        
                        <td>
                            {{ $warga->warga_phone ?? '' }}
                        </td>
                        </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_email') }}
                        </th>
                        <td>
                            {{ $warga->warga_email ?? '' }}
                        </td>
                       </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_birth_date') }}
                        </th>
                        <td>
                            {{ $warga->warga_birth_date ?? '' }}
                        </td>
                        </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_is_ktp_sama_domisili') }}
                        </th>
                        <td>
                            {{ $warga->warga_is_ktp_sama_domisili ?? '' }}
                        </td>
                        </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_join_date') }}
                        </th>
                        <td>
                            {{ $warga->warga_join_date ?? '' }}
                        </td>
                       </tr>
                       
                       <tr>
                       <th>
                            {{ trans('global.warga.fields.warga_pendidikan') }}
                        </th>
                        <td>
                            {{ $warga->warga_pendidikan ?? '' }}
                        </td>
                       </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_rt') }}
                        </th>
                        <td>
                            {{ $warga->warga_rt ?? '' }}
                        </td>
                        </tr>
                        
                        <tr>
                        <th>
                            {{ trans('global.warga.fields.warga_status') }}
                        </th>
                        <td>
                            {{ $warga->warga_status ?? '' }}
                        </td>
                        </tr>
                       
                       
                        
                       
                        
                       
                       
                       
                      
                      
                     
                       
                        
                        
                      
                       
                       
                        
                        
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection