<?php

namespace App\Controllers;

use App\DB;

class VisitController
{
    /**
     * @throws \Exception
     */
    public static function detectVisitor()
    {
        $data = [
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER["HTTP_USER_AGENT"],
            'view_date' => date("Y-m-d H:i:s"),
            'page_url' => $_SERVER['HTTP_REFERER']
        ];

        $DB = new DB();
        $existingVisit = $DB->findVisitor([
            'ip_address' => $data['ip_address'],
            'user_agent' => $data['user_agent'],
            'page_url' => $data['page_url']
        ]);

        if (!$existingVisit) {
            $DB->insertVisitor($data);
        } else {
            $current_views = $existingVisit['views_count'];
            $DB->updateVisitor([
                'id' => $existingVisit['id'],
                'view_date' => $data['view_date'],
                'views_count' => $current_views + 1
            ]);
        }
    }
}