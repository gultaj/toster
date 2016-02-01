<?php namespace App\Toster\Pagination;


use Illuminate\Pagination\BootstrapThreePresenter as Presenter;

class AdminPaginator extends Presenter {

    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pagination">%s %s %s</ul>',
                ($this->currentPage() == 1) ? '' : $this->getPreviousButton('←'),
                $this->getLinks(),
                ($this->currentPage() == $this->lastPage()) ? '' : $this->getNextButton('→')
            );
        }

        return '';
    }

    public function from()
    {
        return ($this->currentPage() - 1) * $this->paginator->perPage() + 1;
    }

    public function perPage()
    {
        return $this->paginator->perPage();
    }

    public function to()
    {
        return $this->paginator->perPage() * $this->paginator->currentPage();
    }
}