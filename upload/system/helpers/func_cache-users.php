<?php
		
		
		
		
		
		
	{
		if( ! $this->id ) {
			return FALSE;
		}
		if( empty($uname) ) {
			return FALSE;
		}
		$cachekey	= 'n:'.$this->id.',twitusername:'.strtolower($uname);
		$uid	= $this->cache->get($cachekey);
		if( FALSE!==$uid && TRUE!=$force_refresh ) {
			return $return_id ? $uid : $this->get_user_by_id($uid);
		}
		$uid	= FALSE;
		$r	= $this->db2->query('SELECT user_id FROM users_details WHERE extrnlusr_twitter="'.$this->db2->escape($uname).'" LIMIT 1', FALSE);
		if( $o = $this->db2->fetch_object($r) ) {
			$uid	= intval($o->user_id);
			$this->cache->set($cachekey, $uid, $GLOBALS['C']->CACHE_EXPIRE);
			return $return_id ? $uid : $this->get_user_by_id($uid);
		}
		$this->cache->del($cachekey);
		return FALSE;
	}*/