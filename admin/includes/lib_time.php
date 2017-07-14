<?php
/**
 * ʱ�亯��
 * ============================================================================
*/
if (!defined('IN_cnly'))
{
    die('Hacking attempt');
}

/**
 * ��õ�ǰ��������ʱ���ʱ���
 *
 * @return  integer
 */ 
function gmtime()
{
    return (time() - date('Z'));
}

/**
 * ��÷�������ʱ��
 *
 * @return  integer
 */
function server_timezone()
{
    if (function_exists('date_default_timezone_get'))
    {
        return date_default_timezone_get();
    }
    else
    {
        return date('Z') / 3600;
    }
}


/**
 *  ����һ���û��Զ���ʱ�����ڵ�GMTʱ���
 *
 * @access  public
 * @param   int     $hour
 * @param   int     $minute
 * @param   int     $second
 * @param   int     $month
 * @param   int     $day
 * @param   int     $year
 *
 * @return void
 */
function local_mktime($hour = NULL , $minute= NULL, $second = NULL,  $month = NULL,  $day = NULL,  $year = NULL)
{
    $timezone = isset($_SESSION['timezone']) ? $_SESSION['timezone'] : $GLOBALS['_CFG']['timezone'];

    /**
    * $time = mktime($hour, $minute, $second, $month, $day, $year) - date('Z') + (date('Z') - $timezone * 3600)
    * ����mktime����ʱ������ټ�ȥdate('Z')ת��ΪGMTʱ�䣬Ȼ������Ϊ�û��Զ���ʱ�䡣�����ǻ������
    **/
    $time = mktime($hour, $minute, $second, $month, $day, $year) - $timezone * 3600;

    return $time;
}





/**
 * ת���ַ�����ʽ��ʱ����ʽΪGMTʱ���
 *
 * @param   string  $str
 *
 * @return  integer
 */
function gmstr2time($str)
{
    $time = strtotime($str);

    if ($time > 0)
    {
        $time -= date('Z');
    }

    return $time;
}


/**
 * ����û�����ʱ��ָ����ʱ���
 *
 * @param   $timestamp  integer     ��ʱ���������һ�����������ص�ʱ���
 *
 * @return  array
 */
function local_gettime($timestamp = NULL)
{
    $tmp = local_getdate($timestamp);
    return $tmp[0];
}


?>