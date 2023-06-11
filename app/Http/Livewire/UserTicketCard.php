<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class UserTicketCard extends Component
{
    use Actions;
    public $ticketInfo;
    public $waitingForScan = true;
    protected $listeners = [
        'echo:test-channel,TestEvent' => 'newTicketScanned',
        'stopWaitingForScan',
        'startWaitingForScan'
    ];

    public function stopWaitingForScan()
    {
        $this->waitingForScan = false;
    }

    public function startWaitingForScan()
    {
        $this->waitingForScan = true;
    }

    public function showSuccessDialog()
    {
        $this->dialog()->show([
            'title'       => $this->ticketInfo['user']['name'],
            'description' => $this->ticketInfo['code'],
            'icon'        => 'success',
            'timeout'     =>  "5000",
            'onClose' => [
                'method' => 'startWaitingForScan',
                'params' => ['onClose'],
            ],
        ]);
    }

    public function showErrorDialog()
    {
        $this->dialog()->show([
            'title'       => 'Ticket Expired',
            'description' => 'This ticket cannot be used',
            'icon'        => 'error',
            'timeout'     =>  "5000",
            'onClose' => [
                'method' => 'startWaitingForScan',
                'params' => ['onClose'],
            ],
        ]);
    }
    public function newTicketScanned($data)
    {
        $this->ticketInfo = $data['ticket'];
        $this->stopWaitingForScan();
        ($this->ticketInfo['status'] === '1')
            ? $this->showSuccessDialog()
            : $this->showErrorDialog();
    }
    public function render()
    {
        return view('livewire.user-ticket-card');
    }
}
