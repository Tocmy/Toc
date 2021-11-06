<?php
namespace App\Traits;
use Jenssegers\Agent\Agent;
/**
 *
 */
trait UserAgentTrait
{
   public static function bootUserAgent()
   {
       static::createing (function ($model){
           $model->agent = request()->header('userAgent');
           if ($model->parse_agent_fields) {
               $model = Self::parseAgentString($model);
           }
       });
   }


   Public static function parseAgentString($model)
   {
       $agent = new Agent();
       $agent ->setUserAgent($model->agent);
       $model->platform          = $agent->platform();
       $model->platform_version  = $agent->version($model->platform);
       $model->browser           = $agent->browser();
       $model->browser_version   = $agent->version($model->browser);
       $model->device            = Self::getDevice($agent);
       $model->device->name      = $agent->device();
       return $model;
   }

   public static function getDevice (Agent $agent)
   {
       if ($agent->isMobile())
           return 'mobile';
       if ($agent->isDesktop())
           return 'desktop';
       if ($agent->isTablet())
           return 'tablet';
       if ($agent->isBot())
           return 'bot';
        return 'unknown';


   }

}


