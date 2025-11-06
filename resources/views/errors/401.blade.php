@extends('errors::minimal')

@section('title', __($data["title"] ?? 'Unauthorized'))
@section('code', $data["code"] ?? '401')
@section('message', __($data["message"] ?? 'Oops! Vous n\'avez pas les accès necessaire pour ouvrir cette passe'))
