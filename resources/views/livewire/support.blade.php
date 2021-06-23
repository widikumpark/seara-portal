<div>
    <div>
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success my-3">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title" style="font-weight: bold; font-size:2rem">Your Tickets</p>
                        @if (count($supportTickets) === 0)
                            <div class="alert alert-warning" role="alert">
                                <h3 class="alert-heading">No Tickets. </h3>
                                <p class="my-3">You have no tickets yet. Please open a new ticket.
                                </p>
                                <hr>

                            </div>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Ticket Number</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supportTickets as $key => $supportTicket)

                                        <tr wire:click='viewTicket({{ $key }})' style="cursor: pointer ">
                                            <td><span
                                                    class="font-weight-bold">#{{ $supportTicket->ticket_number }}</span>
                                            </td>
                                            <td>{{ $supportTicket->title }}</td>
                                            @switch($supportTicket->status)
                                                @case(1)
                                                    <td><span class="badge badge-success">Active</span></td>
                                                @break
                                                @case(2)
                                                    <td><span class="badge badge-warning">Closed</span></td>
                                                @break
                                                @default
                                                    <td><span class="badge badge-danger">Cancelled</span></td>

                                            @endswitch

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>

            </div>
            {{-- form --}}

            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header">

                        <!-- Credit card form tabs -->
                        <p style="font-weight: bold; font-size:2rem">Create a new Ticket</p>
                        <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form wire:submit.prevent="submit" role="form">
                                    <div class="form-group"> <label for="type">
                                            <h6>Type</h6>
                                        </label>
                                        <Select class="form-control" wire:model='newTicketType' name="type">
                                            @foreach ($ticketTypes as $index => $ticketType)
                                                <option value="{{ $index }}">{{ $ticketType }}
                                                </option>
                                            @endforeach
                                        </Select>
                                    </div>
                                    <div class="form-group"> <label for="title">
                                            <h6>Title</h6>
                                        </label> <input wire:model='newTicketTitle' type="text" name="newTicketTitle"
                                            placeholder="Ticket Title" required class="form-control ">
                                        @error('newTicketTitle') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group"> <label for="newTicketMessage">
                                            <h6>Message</h6>
                                        </label>
                                        <div class="input-group"> <textarea wire:model='newTicketMessage' type="text"
                                                name="newTicketMessage" placeholder="Message" class="form-control "
                                                required></textarea>
                                            @error('newTicketMessage') <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group"> <label for="username">
                                            <h6>Supporting Documents</h6>
                                        </label> <input wire:model="newTicketSupportingDocuments" type="file"
                                            name="newTicketSupportingDocuments" class="form-control " multiple>
                                        @error('newTicketSupportingDocuments.*') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="card-footer">
                                        <div class="flex-auto">
                                            <button type="submit" class="btn btn-success">Create Ticket</button>
                                        </div>
                                    </div>
                                    <div wire:loading>
                                        Processing Request...
                                    </div>
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

    </style>
