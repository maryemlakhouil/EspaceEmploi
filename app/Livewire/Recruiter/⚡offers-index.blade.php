<?php
namespace App\Livewire\Recruiter;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JobOffer;

class OffersIndex extends Component
{
    use WithPagination;

    public string $q = '';
    public string $filter = 'all'; // all | open | closed

    public function render()
    {
        $query = JobOffer::query()
            ->where('user_id', auth()->id())
            ->when($this->q, fn($qq) => $qq->where('title', 'like', "%{$this->q}%"))
            ->when($this->filter === 'open', fn($qq) => $qq->where('is_closed', false))
            ->when($this->filter === 'closed', fn($qq) => $qq->where('is_closed', true))
            ->latest();

        return view('livewire.recruiter.offers-index', [
            'offers' => $query->paginate(10),
        ]);
    }
}

?>

<div>
    {{-- Well begun is half done. - Aristotle --}}
</div>