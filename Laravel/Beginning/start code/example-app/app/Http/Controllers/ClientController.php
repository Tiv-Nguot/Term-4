<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        return "Welcome to Client Page!";
    }
    public function isClient() {
        return "Hey, I am your Client";
    }
}
