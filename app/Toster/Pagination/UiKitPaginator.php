<?php namespace App\Toster\Pagination;


use Illuminate\Pagination\BootstrapThreePresenter as Presenter;
use Illuminate\Pagination\LengthAwarePaginator;

class UiKitPaginator extends LengthAwarePaginator {

    protected $paginationWrapper = '<ul class="pagination">%s %s %s</ul>';

    protected $disabledPageWrapper = '<li class="uk-disabled"><span>%s</span></li>';

    protected $activePageWrapper = '<li class="pagination__current"><span class="pagination__link">%s</span></li>';

    protected $previousButtonText = '← Предыдущие';

    protected $nextButtonText = 'Следующие →';

//    public function render($view = null, $data = [])
//    {
//        if ($this->hasPages()) {
//            return sprintf(
//                '<ul class="pagination">%s %s %s</ul>',
//                ($this->currentPage() == 1) ? '' : $this->getPreviousButton('← Предыдущие'),
//                $this->getLinks(),
//                ($this->currentPage() == $this->lastPage()) ? '' : $this->getNextButton('Следующие →')
//            );
//        }
//
//        return '';
//    }
//
//    protected function getDisabledTextWrapper($text)
//    {
//        return '<li class="uk-disabled"><span>'.$text.'</span></li>';
//    }
//
//    protected function getActivePageWrapper($text)
//    {
//        return '<li class="pagination__current"><span class="pagination__link">'.$text.'</span></li>';
//    }
//
//    protected function getAvailablePageWrapper($url, $page, $rel = null)
//    {
//        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';
//
//        return '<li><a class="pagination__link" href="'.htmlentities($url).'"'.$rel.'>'.$page.'</a></li>';
//    }
}