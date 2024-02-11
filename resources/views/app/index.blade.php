@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center gap-7 h-full mt-4">
        <div class="w-[25rem] h-[35rem] overflow-hidden">
            <a href="">
                <img src="{{ asset('images/all-female-outfits.jpg') }}" id="all_female_outfits" alt=""
                    class="rounded-md w-full h-full transition-transform duration-400 transform scale-100 hover:scale-125" />
            </a>
        </div>
        <div class="w-[25rem] h-[35rem] overflow-hidden">
            <a href="">
                <img src="{{ asset('images/all-male-outfits.jpg') }}" id="all_male_outfits" alt="" class="rounded-md transition-transform duration-400 transform scale-100 hover:scale-125">
            </a>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.addEventListener('load', () => {
            $('#all_female_outfits').on('mouseenter', function () {
                $(this).attr('src', '/images/all-female-outfits-hover.jpg')
            })
            $('#all_female_outfits').on('mouseleave', function () {
                $(this).attr('src', '/images/all-female-outfits.jpg')
            })
            $('#all_male_outfits').on('mouseenter', function () {
                $(this).attr('src', '/images/all-male-outfits-hover.jpg')
            })
            $('#all_male_outfits').on('mouseleave', function () {
                $(this).attr('src', '/images/all-male-outfits.jpg')
            })
        })
    </script>
@endsection
