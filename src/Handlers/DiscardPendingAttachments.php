<?php

namespace MichielKempen\NovaFroalaField\Handlers;

use MichielKempen\NovaFroalaField\Models\PendingAttachment;
use Illuminate\Http\Request;

class DiscardPendingAttachments
{
    /**
     * Discard pendings attachments on the field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        PendingAttachment::where('draft_id', $request->draftId)
                    ->get()
                    ->each
                    ->purge();
    }
}
