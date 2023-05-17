<?php
/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 */

namespace OCA\KmaSercurity\Models;

class HistoryModel{
    private $id;
    private $accuracy;
    private $val_accuracy;
    private $loss;
    private $val_loss;

    public function __construct(
        $id,$accuracy,$val_accuracy,$loss,$val_loss
    ){
        $this->id = $id;
        $this->accuracy = $accuracy;
        $this->val_accuracy = $val_accuracy;
        $this->loss = $loss;
        $this->val_loss = $val_loss;
    }
}