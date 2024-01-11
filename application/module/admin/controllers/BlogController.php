<?php
class BlogController extends AdminController
{
    // ACTION: LIST Blog
    public function indexAction()
    {
        $this->_view->_title         = 'Blog Manager :: List';
        $totalItems                    = $this->_model->countItem($this->_arrParam, null);

        $configPagination = array('totalItemsPerPage'    => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $this->_view->pagination    = new Pagination($totalItems, $this->_pagination);

        $this->_view->slbCategory    = $this->_model->itemInSelectbox($this->_arrParam, null);
        $this->_view->Items         = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render('blog/index');
    }

    // ACTION: ADD & EDIT Blog
    public function formAction()
    {
        $this->_view->_title = 'Blog : Add';
        $this->_view->slbCategory        = $this->_model->itemInSelectbox($this->_arrParam, null);
        if (!empty($_FILES)) $this->_arrParam['form']['picture']  = $_FILES['picture'];

        if (isset($this->_arrParam['id'])) {
            $this->_view->_title = 'Blog : Edit';
            $this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
            if (empty($this->_arrParam['form'])) URL::redirect('admin', 'blog', 'index');
        }

        if ($this->_arrParam['form']['token'] > 0) {
            $task            = 'add';
            if (isset($this->_arrParam['form']['id'])) {
                $task        = 'edit';
            }
            $this->_validate->validate($this->_arrParam['form']);
            $this->_arrParam['form'] = $this->_validate->getResult();

            if ($this->_validate->isValid() == false) {
                $this->_view->errors = $this->_validate->showErrors();
            } else {
                $id    = $this->_model->saveItem($this->_arrParam, array('task' => $task));
                if ($this->_arrParam['type'] == 'save-close')     URL::redirect('admin', 'blog', 'index');
                if ($this->_arrParam['type'] == 'save-new')         URL::redirect('admin', 'blog', 'form');
                if ($this->_arrParam['type'] == 'save')             URL::redirect('admin', 'blog', 'form', array('id' => $id));
            }
        }

        $this->_view->arrParam = $this->_arrParam;
        $this->_view->render('blog/form');
    }

    // ACTION: AJAX SPEACIAL (*)
    public function ajaxSpecialAction()
    {
        $result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-special'));
        echo json_encode($result);
    }
}
