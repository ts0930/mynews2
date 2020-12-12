@extends('layouts.admin')
@section('title', '野球情報作成')

@section('contents')
        <div class="container">
            <div class row>
                <div class="col-md-8 mx-auto">
                    <h2>野球調査</h2>
                   <form action="{{ action('Adnin\baseballcontroller@update')}}" method="post"enctype="multipart/form-data">
                       
                   </form>
                </div>
                    
            </div>
        </div>