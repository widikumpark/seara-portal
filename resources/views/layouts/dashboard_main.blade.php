@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    @yield('body')
@stop

@section('css')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@stop
@include('sweetalert::alert')

@section('js')
    <<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            const SwalModal = (icon, title, html) => {
                Swal.fire({
                    icon,
                    title,
                    html
                })
            }

            const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
                Swal.fire({
                    icon,
                    title,
                    html,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText,
                    reverseButtons: false,
                }).then(result => {
                    if (result.value) {
                        return livewire.emit(method, params)
                    }

                    if (callback) {
                        return livewire.emit(callback)
                    }
                })
            }

            const SwalAlert = (icon, title, timeout = 7000) => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: timeout,
                    onOpen: toast => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon,
                    title
                })
            }

            document.addEventListener('DOMContentLoaded', () => {
                this.livewire.on('swal:modal', data => {
                    SwalModal(data.icon, data.title, data.text)
                })

                this.livewire.on('swal:confirm', data => {
                    SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data
                        .params, data.callback)
                })

                this.livewire.on('swal:alert', data => {
                    SwalAlert(data.icon, data.title, data.timeout)
                })
            })

        </script>
        <script>
            window.livewire.on('startDownload', path => {
                // open the download in a new tab/window to
                // prevent livewire component from freezing
                window.open('download/' + path, '_blank');
            });

        </script>
        <script src="{{ mix('/js/app.js') }}"></script>
    @stop
