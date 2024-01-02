<?php
class FaqItemModel extends Model
{
    private $_columns = array('id', 'question', 'answer', 'faq_category_id', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
    private $_userInfo;

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_FAQ_ITEM);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
    }

    public function countItem($arrParam, $option = null)
    {
        $query[]    = "SELECT COUNT(`id`) AS `total`";
        $query[]    = "FROM `$this->table`";
        $query[]    = "WHERE `id` > 0";

        // FILTER : KEYWORD
        if (!empty($arrParam['filter_search'])) {
            $keyword    = '"%' . $arrParam['filter_search'] . '%"';
            $query[]    = "AND `question` LIKE $keyword";
        }

        // FILTER : STATUS
        if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
            $query[]    = "AND `status` = '" . $arrParam['filter_state'] . "'";
        }

        $query        = implode(" ", $query);
        $result        = $this->fetchRow($query);
        return $result['total'];
    }

    public function listItem($arrParam, $option = null)
    {
        if ($option == null) {
            $prefixedColumns = array_map(function ($column) {
                return "`faqItem`.`$column`";
            }, $this->_columns);
            $query[] = "SELECT " . implode(', ', $prefixedColumns) . ", `faqCategory`.`name` AS `faq_category`";
            $query[] = "FROM `$this->table` AS `faqItem`";
            $query[] = "LEFT JOIN " . TBL_FAQ_CATEGORY . " AS `faqCategory` ON `faqItem`.`faq_category_id` = `faqCategory`.`id`";
            $query[] = "WHERE `faqItem`.`id` > 0";
            // FILTER : KEYWORD
            if (!empty($arrParam['filter_search'])) {
                $keyword    = '"%' . $arrParam['filter_search'] . '%"';
                $query[]    = "AND `faqItem`.`question` LIKE $keyword";
            }


            // FILTER : STATUS
            if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
                $query[]    = "AND `faqItem`.`status` = '" . $arrParam['filter_state'] . "'";
            }

            // SORT
            if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
                $column       = $arrParam['filter_column'];
                $columnDir    = $arrParam['filter_column_dir'];
                $query[]      = "ORDER BY `faqItem`.`$column` $columnDir";
            } else {
                $query[]      = "ORDER BY `faqItem`.`id` DESC";
            }

            // PAGINATION
            $pagination             = $arrParam['pagination'];
            $totalItemsPerPage      = $pagination['totalItemsPerPage'];
            if ($totalItemsPerPage > 0) {
                $position   = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
                $query[]    = "LIMIT $position, $totalItemsPerPage";
            }

            $query  = implode(" ", $query);
            $result = $this->fetchAll($query);
            return $result;
        }

        if ($option['task'] == 'xml-faq') {
            $query        = "SELECT `id`, `question`, `answer` FROM `$this->table` WHERE `status` = 1";
            $result        = $this->fetchAll($query);
            return $result;
        }
    }

    public function changeStatus($arrParam, $option = null)
    {
        require_once LIBRARY_EXT_PATH . 'XML.php';
        if ($option['task'] == 'change-ajax-status') {
            $status         = ($arrParam['status'] == 0) ? 1 : 0;
            $modified_by    = $this->_userInfo['username'];
            $modified        = date('Y-m-d', time());
            $id        = $arrParam['id'];
            $query    = "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = '" . $id . "'";

            $this->query($query);

            $result = array(
                'id'        => $id,
                'status'    => $status,
                'link'      => URL::createLink('admin', 'faqItem', 'ajaxStatus', array('id' => $id, 'status' => $status))
            );
            $arrFaqItems    = $this->listItem($arrParam, array('task' => 'xml-faqItem'));
            XML::createXML($arrFaqItems, 'faqItem.xml');
            return $result;
        }

        if ($option['task'] == 'change-status') {
            $status         = $arrParam['type'];
            $modified_by    = $this->_userInfo['username'];
            $modified       = date('Y-m-d', time());
            if (!empty($arrParam['cid'])) {
                $ids    = $this->createWhereDeleteSQL($arrParam['cid']);
                $query  = "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` IN ($ids)";
                $this->query($query);
                $arrFaqItems = $this->listItem($arrParam, array('task' => 'xml-faqItem'));
                XML::createXML($arrFaqItems, 'faqItem.xml');
                Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được thay đổi trạng thái!'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
            }
        }
    }

    public function infoItem($arrParam, $option = null)
    {
        if ($option == null) {
            $query[]    = "SELECT `id`, `question`,`answer`,`faq_category_id` ,`status`, `ordering`";
            $query[]    = "FROM `$this->table`";
            $query[]    = "WHERE `id` = '" . $arrParam['id'] . "'";
            $query      = implode(" ", $query);
            $result     = $this->fetchRow($query);
            return $result;
        }
    }

    public function deleteItem($arrParam, $option = null)
    {
        if ($option == null) {
            require_once LIBRARY_EXT_PATH . 'XML.php';
            if (!empty($arrParam['cid'])) {
                $ids    = $this->createWhereDeleteSQL($arrParam['cid']);
                $query  = "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
                $this->query($query);
                $arrCategories    = $this->listItem($arrParam, array('task' => 'xml-category'));
                XML::createXML($arrCategories, 'categories.xml');
                Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được xóa!'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn xóa!'));
            }
        }
    }

    public function saveItem($arrParam, $option = null)
    {
        require_once LIBRARY_EXT_PATH . 'XML.php';

        if ($option['task'] == 'add') {
            $arrParam['form']['created']    = date('Y-m-d', time());
            $arrParam['form']['created_by']    = $this->_userInfo['username'];
            $data    = array_intersect_key($arrParam['form'], array_flip($this->_columns));
            $this->insert($data);
            Session::set('message', array('class' => 'success', 'content' => 'Dữ liệu được lưu thành công!'));
            $arrFaq    = $this->listItem($arrParam, array('task' => 'xml-faqItem'));
            XML::createXML($arrFaq, 'faqItem.xml');

            return $this->lastID();
        }
        if ($option['task'] == 'edit') {
            $arrParam['form']['modified']    = date('Y-m-d', time());
            $arrParam['form']['modified_by'] = $this->_userInfo['username'];

            $data    = array_intersect_key($arrParam['form'], array_flip($this->_columns));
            $this->update($data, array(array('id', $arrParam['form']['id'])));
            Session::set('message', array('class' => 'success', 'content' => 'Dữ liệu được lưu thành công!'));

            $arrFaqs   = $this->listItem($arrParam, array('task' => 'xml-category'));
            XML::createXML($arrFaqs, 'faq.xml');

            return $arrParam['form']['id'];
        }
    }


    public function ordering($arrParam, $option = null)
    {
        if ($option == null) {
            if (!empty($arrParam['order'])) {
                $i = 0;
                $modified_by    = $this->_userInfo['username'];
                $modified        = date('Y-m-d', time());
                foreach ($arrParam['order'] as $id => $ordering) {
                    $i++;
                    $query    = "UPDATE `$this->table` SET `ordering` = $ordering, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
                    $this->query($query);
                }
                Session::set('message', array('class' => 'success', 'content' => 'Có ' . $i . ' phần tử được thay đỏi  ordering!'));
            }
        }
    }

    public function itemInSelectbox($arrParam = null, $option = null)
    {
        if ($option == null) {
            $query     = "SELECT `id`, `name` FROM `" . TBL_FAQ_CATEGORY . "`";
            $result = $this->fetchPairs($query);
            $result['default'] = "- Select Category -";
            ksort($result);
        }
        return $result;
    }
}
