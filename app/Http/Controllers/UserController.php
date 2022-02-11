<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Carbon;
 
use App\Http\Controllers\Controller; 
class UserController extends Controller
{
   /**
     * @OA\Post(
     ** path="/api/login",
     *   tags={"USER"},
     *   summary="User login",
     *   operationId="login",
     * @OA\Parameter(
     *          name="email",
     *          description="Project id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="password",
     *          description="Project id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     * response="200", 
     * description="An example resource",
     *  @OA\JsonContent(type="object",
     *  @OA\Property(format="string",
     *  default="20d338931e8d6bd9466edeba78ea7dce7c7bc01aa5cc5b4735691c50a2fe3228", 
     * description="token", property="token"),
     *  @OA\Property(format="string",
     * description="user Info", property="user",
     *   @OA\Property(format="string",
     *  default="0", 
     * description="id Info", property="id"),
     *   @OA\Property(format="string",
     *  default="john Doe", 
     * description="name Info", property="name"),
     *   @OA\Property(format="string",
     *  default="john Doe address", 
     * description="address Info", property="address"),
     *   @OA\Property(format="string",
     *  default="opening 5:8AM", 
     * description="opening Info", property="opening"),
     *   @OA\Property(format="string",
     *  default="0205105050500", 
     * description="phone Info", property="phone"),
     *   @OA\Property(format="string",
     *  default="JohnDoe@gmail.com", 
     * description="email Info", property="email"),
     *   @OA\Property(format="string",
     *  default="1", 
     * description="type of user 1 is Normal user 2 is  agency 3 is admin ", property="type"),
     *   @OA\Property(format="string",
     *  default="xxxx_xx.png", 
     * description="image_profile Info",
     *  property="image_profile"),
     *   @OA\Property(format="string",
     *  default="2021-07-13 00:00:00", 
     * description="updated_at Info", property="updated_at"),
     *   @OA\Property(format="string",
     *  default="0", 
     * description="created_at Info", property="created_at"),),
     * )),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
        public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $myTTL = 3000; //minutes

        JWTAuth::factory()->setTTL($myTTL);
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
       
        $user = JWTAuth::user();

// return response()->json(compact('token', 'user'));
return  response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => JWTAuth::factory()->getTTL() /60,'user'=>$user,
    ]);

}
 

/**
     * @OA\Post(
     ** path="/api/registerAgency",
     *   tags={"USER"},
     *   summary="Agency registing Info",
     *   operationId="registerAgency",
     * @OA\Parameter(
     *          name="email",
     *          description="email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="password",
     *          description="password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="password_confirmation",
     *          description="password_confirmation",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="name",
     *          description="Name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="phone",
     *          description="PhoneNumber",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="bankcode",
     *          description="bankcode",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="segaltogary",
     *          description="رقم السجل التجاري",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="agencyworker",
     *          description="Name Of Agency Worker",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="APNCode",
     *          description="APNCode",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="bankname",
     *          description="APNCode",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     * response="200", 
     * description="An example resource",
     *  @OA\JsonContent(type="object",
     *  @OA\Property(format="string",
     *  default="20d338931e8d6bd9466edeba78ea7dce7c7bc01aa5cc5b4735691c50a2fe3228", 
     * description="token", property="token"),
     *  @OA\Property(format="string",
     * description="user Info", property="user",
     *   @OA\Property(format="string",
     *  default="0", 
     * description="id Info", property="id"),
     *   @OA\Property(format="string",
     *  default="john Doe", 
     * description="name Info", property="name"),
     *   @OA\Property(format="string",
     *  default="john Doe address", 
     * description="address Info", property="address"),
     *   @OA\Property(format="string",
     *  default="opening 5:8AM", 
     * description="opening Info", property="opening"),
     *   @OA\Property(format="string",
     *  default="0205105050500", 
     * description="phone Info", property="phone"),
     *   @OA\Property(format="string",
     *  default="JohnDoe@gmail.com", 
     * description="email Info", property="email"),
     *   @OA\Property(format="string",
     *  default="1", 
     * description="type of user 1 is Normal user 2 is  agency 3 is admin ", property="type"),
     *   @OA\Property(format="string",
     *  default="xxxx_xx.png", 
     * description="image_profile Info",
     *  property="image_profile"),
     *   @OA\Property(format="string",
     *  default="2021-07-13 00:00:00", 
     * description="updated_at Info", property="updated_at"),
     *   @OA\Property(format="string",
     *  default="0", 
     * description="created_at Info", property="created_at"),),
     * )),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function storeAgency(Request $request){

        $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8|confirmed',
          'password_confirmation' => 'required',
          'phone' => 'required|numeric|unique:users',
  
  
      ]);
  
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
  
    $imgsegal = time().'.'.$request->imgsegal->extension();  
  
    $request->imgsegal->move(public_path('images'), $imgsegal);
  
    /* Store $imageName name in DATABASE from HERE */
  
  
    $imageName = time().'.'.$request->image_profile->extension();  
  
    $request->image_profile->move(public_path('images'), $imageName);
  
    $user=   User::create([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'Address' => $request->Address,
          'password' => Hash::make($request->password),
          'type'=>"2",        'image_profile'=>$imageName, 'imgsegal'=>$imgsegal,
          'bankcode'=>$request->bankcode,
          'segaltogary'=>$request->segaltogary,
          'agencyworker'=>$request->agencyworker,
          'APNCode'=>$request->APNCode,
          'bankname'=>$request->bankname,
  
          
      ]);
  

      $token = JWTAuth::fromUser($user);

      return response()->json(compact('user','token'),201);      }

/**
     * @OA\Post(
     ** path="/api/register",
     *   tags={"USER"},
     *   summary="User registing Info",
     *   operationId="register",
     * @OA\Parameter(
     *          name="email",
     *          description="email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="password",
     *          description="password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="password_confirmation",
     *          description="password_confirmation",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="name",
     *          description="Name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * @OA\Parameter(
     *          name="phone",
     *          description="PhoneNumber",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     * response="200", 
     * description="An example resource",
     *  @OA\JsonContent(type="object",
     *  @OA\Property(format="string",
     *  default="20d338931e8d6bd9466edeba78ea7dce7c7bc01aa5cc5b4735691c50a2fe3228", 
     * description="token", property="token"),
     *  @OA\Property(format="string",
     * description="user Info", property="user",
     *   @OA\Property(format="string",
     *  default="0", 
     * description="id Info", property="id"),
     *   @OA\Property(format="string",
     *  default="john Doe", 
     * description="name Info", property="name"),
     *   @OA\Property(format="string",
     *  default="john Doe address", 
     * description="address Info", property="address"),
     *   @OA\Property(format="string",
     *  default="opening 5:8AM", 
     * description="opening Info", property="opening"),
     *   @OA\Property(format="string",
     *  default="0205105050500", 
     * description="phone Info", property="phone"),
     *   @OA\Property(format="string",
     *  default="JohnDoe@gmail.com", 
     * description="email Info", property="email"),
     *   @OA\Property(format="string",
     *  default="1", 
     * description="type of user 1 is Normal user 2 is  agency 3 is admin ", property="type"),
     *   @OA\Property(format="string",
     *  default="xxxx_xx.png", 
     * description="image_profile Info",
     *  property="image_profile"),
     *   @OA\Property(format="string",
     *  default="2021-07-13 00:00:00", 
     * description="updated_at Info", property="updated_at"),
     *   @OA\Property(format="string",
     *  default="0", 
     * description="created_at Info", property="created_at"),),
     * )),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function register(Request $request)
    {
        $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
                'phone' => 'required|numeric|unique:users',
    
    
            ]);
    
            $user =     User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'Address' => $request->Address,
                'password' => Hash::make($request->password),
                'type'=>"1",        'image_profile'=>"", 'imgsegal'=>"",
            'bankcode'=>"",
            'segaltogary'=>"",
            'agencyworker'=>"",
            'APNCode'=>"",
            'bankname'=>"",
    
                
            ]);
  

        $token = JWTAuth::fromUser($user);

      return response()->json(compact('user','token'),201);
    }

 
  /**
     * @OA\Get(
     ** path="/api/userinfo",
     *   tags={"USER"},
     *   summary="Get User Info Token Auth is required in header bearer",
     *   operationId="getuserinfo",
     *     @OA\Response(
     * response="200", 
     * description="An example resource",
     *  @OA\JsonContent(type="object",
     *  @OA\Property(format="string",
     * description="user Info", property="user",
     *   @OA\Property(format="string",
     *  default="0", 
     * description="id Info", property="id"),
     *   @OA\Property(format="string",
     *  default="john Doe", 
     * description="name Info", property="name"),
     *   @OA\Property(format="string",
     *  default="john Doe address", 
     * description="address Info", property="address"),
     *   @OA\Property(format="string",
     *  default="opening 5:8AM", 
     * description="opening Info", property="opening"),
     *   @OA\Property(format="string",
     *  default="0205105050500", 
     * description="phone Info", property="phone"),
     *   @OA\Property(format="string",
     *  default="JohnDoe@gmail.com", 
     * description="email Info", property="email"),
     *   @OA\Property(format="string",
     *  default="1", 
     * description="type of user 1 is Normal user 2 is  agency 3 is admin ", property="type"),
     *   @OA\Property(format="string",
     *  default="xxxx_xx.png", 
     * description="image_profile Info",
     *  property="image_profile"),
     *   @OA\Property(format="string",
     *  default="2021-07-13 00:00:00", 
     * description="updated_at Info", property="updated_at"),
     *   @OA\Property(format="string",
     *  default="0", 
     * description="created_at Info", property="created_at"),),
     * )),
     *      security={{"apiAuth":{}}},
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function getAuthenticatedUser(Request $request)
        {

                try {

                        if (! $user = JWTAuth::parseToken()->authenticate()) {
                                return response()->json(['user_not_found'], 404);
                        }

                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                        return response()->json(['token_expired'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                        return response()->json(['token_invalid'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                        return response()->json(['token_absent'], $e->getStatusCode());

                }

                return response()->json(compact('user'));
        }
}