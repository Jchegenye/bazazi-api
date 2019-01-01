<?php

namespace Jchegenye\MyAuthentication;

/**
  * Style Json data.
  * Usage: return $this->pre("your array");
  *
  * @author Jackson A. Chegenye
  * @return $json
  */
trait JsonPrettyStyle{

    public function pre($json){

        return "<pre style='
            background-color: #f6f8fa;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-size: 85%;
            line-height: 1.45;
            overflow: auto;
            padding: 16px;
            border-left: 2px solid #00d0ff;
        '>"
            .
                response()->json(
                    $json,200,[],JSON_PRETTY_PRINT
                )
            .
        "</pre>";

    }

}