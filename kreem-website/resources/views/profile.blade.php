@extends('layouts.layout')

@section('title', 'My profile')

@section('page_header', 'My profile')

@section('content')
<div class="row">
    <div class="col-3 mt-3 p-0">
        <div class="information-card mb-3 w-100">
            <div class="avatar-wrapper pt-3 mx-auto">
                <img src="img/account-sketch.svg" alt="" class="profile-picture">
            </div>
            <h5 class="h5 pt-3">Placeholder name</h5>
            <p class="subtitle1 pt-3">Placeholder job</p>
            <div class="row">
                <div class="col-12">
                    <p class="subtitle1"><img class="pr-2"src="img/money.svg" alt="">$placeholder</p>
                </div>
            </div>
            <span class="divider mx-auto mt-3"></span>
            <div class="profile-information mt-3 subtitle1">
                <p class="m-0">Email address</p>
                <p class="pt-1">Placeholder</p>
                <p class="m-0">Phone</p>
                <p class="pt-1">Placeholder</p>
                <p class="m-0">Address</p>
                <p class="pt-1">Placeholder</p>
            </div>
        </div>
    </div>
    <div class="col-9 mt-3 p-0">
        <div class="calendar ml-3 mr-3 mb-3">
            <div class="card px-3 py-3">
                <div class="form-inline">
                    <button class="col-6" id="previous" onclick="previous()"><</button>
                    <button class="col-6" id="next" onclick="next()">></button>
                </div>
                <h3 class="card-header" id="monthAndYear"></h3>
                <table class="table table-bordered" id="calendar">
                    <thead>
                        <tr>
                            <th>Sunday</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                    </thead>

                    <tbody id="calendar-body">

                    </tbody>
                </table>

            
                <br/>
                <form class="form-inline">
                    <label class="lead mr-2 ml-2" for="month">Go to: </label>
                    <select class="form-control col-4 mr-5" name="month" id="month" onchange="goTo()">
                        <option value=0>January</option>
                        <option value=1>February</option>
                        <option value=2>March</option>
                        <option value=3>April</option>
                        <option value=4>May</option>
                        <option value=5>June</option>
                        <option value=6>July</option>
                        <option value=7>August</option>
                        <option value=8>September</option>
                        <option value=9>October</option>
                        <option value=10>November</option>
                        <option value=11>December</option>
                    </select>


                    <label for="year"></label><select class="form-control col-4 ml-5" name="year" id="year" onchange="goTo()">
                    <option value=2020>2020</option>
                    <option value=2021>2021</option>
                    <option value=2022>2022</option>
                    <option value=2023>2023</option>
                    <option value=2024>2024</option>
                    <option value=2025>2025</option>
                    <option value=2026>2026</option>
                    <option value=2027>2027</option>
                    <option value=2028>2028</option>
                    <option value=2029>2029</option>
                    <option value=2030>2030</option>
                    </select>
                </form>
            </div>   
        </div>
    </div>
</div>
@endsection