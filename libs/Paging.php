<?php
class Paging
{
    // tong so ban ghi 
    private $row;
    // số bản ghi sẽ xuất hiện trên 1 trang
    private $page_row;
    // the page number of our last page (tính toán được với $row và $page_row ta sẽ có bao nhiều trang)
    private $last;
    // establish the $pagenum variable (số trang hiện tại)
    private $pageNum;
    // xét giới hạn bỏ qua
    private $limit;

    public function __construct($row, $page_row)
    {
        $this->row = $row;
        $this->page_row = $page_row;
        $this->setLast();
        $this->setPageNum();
        $this->setLimit();
    }

    public function getPageRow()
    {
        return $this->page_row;
    }

    private function setLast()
    {
        $this->last = ceil($this->row / $this->page_row);
    }

    public function getLast()
    {
        return $this->last;
    }

    private function setPageNum()
    {
        if (isset($_GET['page'])) {
            $this->pageNum = preg_replace('#[^0-9]#', '', $_GET['page']);
            $this->pageNum = min($this->getLast(), max(1, $this->pageNum)); // Đảm bảo giá trị là số nguyên dương và không vượt quá trang cuối cùng
        } else {
            $this->pageNum = 1;
        }
    }

    public function getPageNum()
    {
        return $this->pageNum;
    }

    private function setLimit()
    {
        $this->limit = ($this->getPageNum() - 1) * $this->page_row;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getPaginationHtml($url)
    {
        if ($this->getLast() > 1) {
            $paginationHTML = '<nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">';
            $paginationHTML .= '<ul class="pagination">';
            if ($this->getPageNum() > 1) {
                $previous = $this->getPageNum() - 1;
                $prevLink = $url . '&page=' . $previous;
                $paginationHTML .= '
                                <li class="page-item"><a class="page-link" href="' . $prevLink . '"><i class="ci-arrow-left me-2"></i>Prev</a></li>
                            ';
                for ($i = $this->getPageNum() - 4; $i < $this->getPageNum(); $i++) {
                    if ($i > 0) {
                        $numLinkLeft = $url . '&page=' . $i;
                        $paginationHTML .= '<li class="page-item d-none d-sm-block"><a class="page-link" href="' . $numLinkLeft . '">' . $i . '</a></li>';
                    }
                }
            } else {
                $paginationHTML .= '
                                <li class="page-item disabled"><span class="page-link"><i class="ci-arrow-left me-2"></i>Prev</span></li>
                            ';
            }

            $paginationHTML .= '<li class="page-item active" aria-current="page"><span class="page-link">' . $this->getPageNum() . '<span class="visually-hidden">(current)</span></span></li>';

            for ($i = $this->getPageNum() + 1; $i <= $this->getLast(); $i++) {
                $numLinkRight = $url . '&page=' . $i;
                $paginationHTML .= '<li class="page-item d-none d-sm-block"><a class="page-link" href="' . $numLinkRight . '">' . $i . '</a></li>';
                if ($i >= $this->getPageNum() + 4) {
                    break;
                }
            }



            if ($this->getPageNum() != $this->getLast()) {
                $next = $this->getPageNum() + 1;
                $nextLink = $url . '&page=' . $next;
                $paginationHTML .= '<li class="page-item"><a class="page-link" href="' . $nextLink . '" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>';
            } else {
                $paginationHTML .= '<li class="page-item disabled"><span class="page-link" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></span></li>';
            }

            $paginationHTML .= '</ul>';
            $paginationHTML .= '</nav>';
        }
        return $paginationHTML;
    }

    // public function getPaginationHtml($url)
    // {
    //     if ($this->getLast() > 1) {
    //         $paginationHTML = '<nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">';
    //         $paginationHTML .= '<ul class="pagination">';
    //         if ($this->getPageNum() > 1) {
    //             $previous = $this->getPageNum() - 1;
    //             $prevLink = $url . '&page=' . $previous . '.html';
    //             $paginationHTML .= '
    //                         <li class="page-item"><a class="page-link" href="' . $prevLink . '"><i class="ci-arrow-left me-2"></i>Prev</a></li>
    //                     ';
    //             for ($i = $this->getPageNum() - 4; $i < $this->getPageNum(); $i++) {
    //                 if ($i > 0) {
    //                     $numLinkLeft = $url . '&page=' . $i . '.html';
    //                     $paginationHTML .= '<li class="page-item d-none d-sm-block"><a class="page-link" href="' . $numLinkLeft . '">' . $i . '</a></li>';
    //                 }
    //             }
    //         } else {
    //             $paginationHTML .= '
    //                         <li class="page-item disabled"><span class="page-link"><i class="ci-arrow-left me-2"></i>Prev</span></li>
    //                     ';
    //         }

    //         $paginationHTML .= '<li class="page-item active" aria-current="page"><span class="page-link">' . $this->getPageNum() . '<span class="visually-hidden">(current)</span></span></li>';

    //         for ($i = $this->getPageNum() + 1; $i <= $this->getLast(); $i++) {
    //             $numLinkRight = $url . '&page=' . $i . '.html';
    //             $paginationHTML .= '<li class="page-item d-none d-sm-block"><a class="page-link" href="' . $numLinkRight . '">' . $i . '</a></li>';
    //             if ($i >= $this->getPageNum() + 4) {
    //                 break;
    //             }
    //         }

    //         if ($this->getPageNum() != $this->getLast()) {
    //             $next = $this->getPageNum() + 1;
    //             $nextLink = $url . '&page=' . $next . '.html';
    //             $paginationHTML .= '<li class="page-item"><a class="page-link" href="' . $nextLink . '" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>';
    //         } else {
    //             $paginationHTML .= '<li class="page-item disabled"><span class="page-link" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></span></li>';
    //         }

    //         $paginationHTML .= '</ul>';
    //         $paginationHTML .= '</nav>';
    //     }
    //     return $paginationHTML;
    // }
}
