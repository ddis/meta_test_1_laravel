<?php


namespace App\Http\Controllers;


use Ddis\Meta\Validator;
use Illuminate\Http\Request;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    public function index()
    {
        return view('main');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $string    = $request->get('string', '');
        $validator = new Validator();

        try {
            $response['result'] = $validator->setString($string ?? '')->validate();
        } catch (\Exception $exception) {
            $code              = 400;
            $response["error"] = $exception->getMessage();
        }

        $response['string'] = $string;

        return response($response, $code ?? 200)
            ->header('Content-Type', 'application/json');
    }
}
