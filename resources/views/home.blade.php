@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ __('Fill Out Google-Form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {!!Session ::get('success') !!}
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {!!Session ::get('fail') !!}
                            </div>
                        @endif
                    <div class="p-2 ">
                        <h3 class="d-none d-sm-block">Today's Date: {{date('d/m/Y')}}</h3>
                        <h5 class="d-block d-sm-none">Today's Date: {{date('d/m/Y')}}</h5>
                        <form action="/home" method="post" class="pt-2">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select aria-required name="subject" id="subject" class="form-control form-select-lg mb-3  @error('subject') is-invalid @enderror" aria-label=".form-control-lg select example">
                                    <option value="" selected>Select Subject</option>
                                    <option value="BC">Bahasa Cina</option>
                                    <option value="BI">Bahasa Inggeris</option>
                                    <option value="BJ">Bahasa Jepun</option>
                                    <option value="BM">Bahasa Melayu</option>
                                    <option value="BT">Bahasa Tamil</option>
                                    <option value="BIO">Biologi</option>
                                    <option value="FIZ">Fizik</option>
                                    <option value="KBT">Kesusteraan Bahasa Tamil</option>
                                    <option value="KIM">Kimia</option>
                                    <option value="MA">Matematik</option>
                                    <option value="MT">Matematik Tambahan</option>
                                    <option value="PK">Pendidikan Jasmani & Kesihatan</option>
                                    <option value="PM">Pendidikan Moral</option>
                                    <option value="PP">Prinsip Perakaunan</option>
                                    <option value="SN">Sains</option>
                                    <option value="SK">Sains Komputer</option>
                                    <option value="SEJ">Sejarah</option>
                                </select>

                                @error('subject')
                                <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div id="button-custom"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
