<?php
class Pagination
{

	private $totalItems;					// Tổng số phần tử
	private $totalItemsPerPage		= 1;	// Tổng số phần tử xuất hiện trên một trang
	private $pageRange				= 5;	// Số trang xuất hiện
	private $totalPage;						// Tổng số trang
	private $page;						    // trang hiện tại (showPaginationShop)
	private $currentPage			= 1;	// Trang hiện tại
	private $last;

	public function __construct($totalItems, $pagination)
	{
		$this->totalItems			= $totalItems;
		$this->totalItemsPerPage	= $pagination['totalItemsPerPage'];

		if ($pagination['pageRange'] % 2 == 0) $pagination['pageRange'] = $pagination['pageRange'] + 1;

		$this->pageRange			= $pagination['pageRange'];
		$this->currentPage			= $pagination['currentPage'];
		$this->page 				= $this->getPage(); //(shop)
		$this->totalPage			= ceil($totalItems / $pagination['totalItemsPerPage']);
	}

	private function getPage()
	{
		if (isset($_GET['page'])) {
			$this->page = preg_replace('#[^0-9]#', '', $_GET['page']);
			$this->page = ($this->page == 0) ? 1 : $this->page; // Đảm bảo giá trị không là 0
			$this->page = max(1, $this->page); // Đảm bảo giá trị là số nguyên dương
		} else {
			$this->page = 1; // Nếu không có tham số page, mặc định là trang 1
		}
		return $this->page;
	}


	public function showPagination($link)
	{
		// Pagination
		$paginationHTML = '';
		if ($this->totalPage > 1) {
			$start 	= '<div class="button2-right off"><div class="start"><span>Start</span></div></div>';
			$prev 	= '<div class="button2-right off"><div class="prev"><span>Pre</span></div></div>';
			if ($this->currentPage > 1) {
				$start 	= '<div class="button2-right"><div class="start"><a onclick="javascript:changePage(1)" href="#">Start</a></div></div>';
				$prev 	= '<div class="button2-right"><div class="prev"><a onclick="javascript:changePage(' . ($this->currentPage - 1) . ')" href="#">Previous</a></div></div>';
			}

			$next 	= '<div class="button2-left off"><div class="next"><span>Next</span></div></div>';
			$end 	= '<div class="button2-left off"><div class="end"><span>End</span></div></div>';
			if ($this->currentPage < $this->totalPage) {
				$next 	= '<div class="button2-left"><div class="next"><a onclick="javascript:changePage(' . ($this->currentPage + 1) . ')" href="#">Next</a></div></div>';
				$end 	= '<div class="button2-left"><div class="end"><a href="#" onclick="javascript:changePage(' . $this->totalPage . ')">End</a></div></div>';
			}

			if ($this->pageRange < $this->totalPage) {
				if ($this->currentPage == 1) {
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				} else if ($this->currentPage == $this->totalPage) {
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				} else {
					$startPage		= $this->currentPage - ($this->pageRange - 1) / 2;
					$endPage		= $this->currentPage + ($this->pageRange - 1) / 2;

					if ($startPage < 1) {
						$endPage	= $endPage + 1;
						$startPage = 1;
					}

					if ($endPage > $this->totalPage) {
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			} else {
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}

			$listPages = '<div class="button2-left"><div class="page">';
			for ($i = $startPage; $i <= $endPage; $i++) {
				if ($i == $this->currentPage) {
					$listPages .= '<span>' . $i . '</span>';
				} else {
					$listPages .= '<a href="#" onclick="javascript:changePage(' . $i . ')">' . $i . '</a>';
				}
			}
			$listPages .= '</div></div>';
			$endPagination	= '<div class="limit">Page ' . $this->currentPage . ' of ' . $this->totalPage . '</div>';
			$paginationHTML = '<div class="pagination">' . $start . $prev . $listPages . $next . $end . $endPagination . '</div>';
		}
		return $paginationHTML;
	}
}
