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

class TrainModel{
    private $id;
    private $accuracy;
    private $precision;
    private $recall;

    public function __construct(
        $id,$accuracy,$precision,$recall
    ){
        $this->id = $id;
        $this->accuracy = $accuracy;
        $this->precision = $precision;
        $this->recall = $recall;
    }

    /**
     * Description
     *
     * @NoAdminRequired
     */
    public function FunctionName()
    {
        //call api or db
    }
}