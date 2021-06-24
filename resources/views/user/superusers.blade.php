@extends('layouts.master')

@section('content')

    <div class="content-area card">
        <div class="card-innr">
            <div class="card-head">
                <h4 class="card-title">KYC List</h4>
            </div>
            <table class="data-table dt-init kyc-list">
                <thead>
                <tr class="data-item data-head">
                    <th class="data-col dt-user">User</th>
                    <th class="data-col dt-doc-type">Doc Type</th>
                    <th class="data-col dt-doc-front">Documents</th>
                    <th class="data-col dt-doc-back">&nbsp;</th>
                    <th class="data-col dt-status">Status</th>
                    <th class="data-col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr class="data-item">
                        <td class="data-col dt-user"><span class="lead user-name">{{ $user->mureed ? $user->mureed->name : $user->name }}</span><span
                                class="sub user-id">{{ $key+1 }}</span></td>
                        <td class="data-col dt-doc-type"><span class="sub sub-s2 sub-dtype">National ID
                                        Card</span></td>
                        <td class="data-col dt-doc-front"><a href="images/passport-a-fornt.jpg"
                                                             class="image-popup">Front Part</a> &nbsp; &nbsp; <a href="#"><em
                                    class="fas fa-download"></em></a></td>
                        <td class="data-col dt-doc-back"><a href="images/passport-a-back.jpg"
                                                            class="image-popup">Back Part</a> &nbsp; &nbsp; <a href="#"><em
                                    class="fas fa-download"></em></a></td>
                        <td class="data-col dt-status"><span
                                class="dt-status-md badge badge-outline badge-success badge-md">Approved</span><span
                                class="dt-status-sm badge badge-sq badge-outline badge-success badge-md">A</span>
                        </td>
                        <td class="data-col text-right">
                            <div class="relative d-inline-block"><a href="#"
                                                                    class="btn btn-light-alt btn-xs btn-icon toggle-tigger"><em
                                        class="ti ti-more-alt"></em></a>
                                <div class="toggle-class dropdown-content dropdown-content-top-left">
                                    <ul class="dropdown-list">
                                        <li><a href="kyc-details.html"><em class="ti ti-eye"></em> View
                                                Details</a></li>
                                        <li><a href="#"><em class="ti ti-check"></em> Approve</a></li>
                                        <li><a href="#"><em class="ti ti-na"></em> Cancel</a></li>
                                        <li><a href="#"><em class="ti ti-trash"></em> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr><!-- .data-item -->
                @endforeach

            </table>
        </div><!-- .card-innr -->
    </div><!-- .card -->

@endsection
