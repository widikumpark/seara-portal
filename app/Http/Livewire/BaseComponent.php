<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    public function showModal($type, $title, $message)
    {
        $this->emit('swal:modal', [
            'type'  => $type,
            'title' => $title,
            'text'  => $message,
        ]);
    }

    public function showAlert($type, $title)
    {
        $this->emit('swal:alert', [
            'type'    => $type,
            'title'   => $title,
            'timeout' => 3000
        ]);
    }

    /**
     * Shows Confirmation Dialog
     *
     * @param type Type of Confirmation
     * @param title Title of Confirmation
     * @param message Message to be shown
     * @param method Confirmation Method
     * @param confirmText Confirmation Button Text
     * @param params Optional Parameters
     * @param callback Callback Function
     */
    public function showConfirmation($type, $title, $message, $confirmBtnText, $method, $params = [], $callback = "")
    {
        $this->emit("swal:confirm", [
            'type'        => $type,
            'title'       => $title,
            'text'        => $message,
            'confirmText' => $confirmBtnText,
            'method'      => $method,
            'params'      => $params, // optional, send params to success confirmation
            'callback'    => $callback, // optional, fire event if no confirmed
        ]);
    }
    public function viewQuote($key)
    {

        redirect(route('view-quote', $this->quotes[$key]->number));
    }

    public function contactSupport()
    {
        redirect()->route("support");
    }
}
