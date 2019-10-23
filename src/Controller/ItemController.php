<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ItemManager;

/**
 * Class ItemController
 *
 */
class ItemController
{


    /**
     * Retrieve item listing
     *
     * @return string
     */
    public function all()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->selectAll();
        
        return json_encode($items);
    }


    /**
     * Retrieve item informations specified by $id
     *
     * @param int $id
     * @return string
     */
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return json_encode($item);
    }


    /**
     * Edit item by $id
     *
     * @param int $id
     * @return string
     */
    public function edit(int $id): string
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item['title'] = $_POST['title'];
            $itemManager->update($item);
        }
    }


    /**
     * post new item
     *
     * @return string
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new ItemManager();
            $item = [
                'title' => $_POST['title'],
            ];
            $itemManager->insert($item);
        }
    }


    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new ItemManager();
        $itemManager->delete($id);
    }
}
