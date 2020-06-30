<?php

namespace Illuminate\Support\Facades;

use Illuminate\Filesystem\Filesystem;

/**
 * @method static \Illuminate\Contracts\Filesystem\Filesystem disk(string $name = null)
 *
 * @see \Illuminate\Filesystem\FilesystemManager
 */
class Storage extends Facade
{
    /**
     * Replace the given disk with a local testing disk.
     *
     * @param  string|null  $disk
<<<<<<< HEAD
     *
     * @return \Illuminate\Filesystem\Filesystem
     */
    public static function fake($disk = null)
    {
        $disk = $disk ?: self::$app['config']->get('filesystems.default');
=======
     * @param  array  $config
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public static function fake($disk = null, array $config = [])
    {
        $disk = $disk ?: static::$app['config']->get('filesystems.default');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        (new Filesystem)->cleanDirectory(
            $root = storage_path('framework/testing/disks/'.$disk)
        );

<<<<<<< HEAD
        static::set($disk, $fake = self::createLocalDriver(['root' => $root]));
=======
        static::set($disk, $fake = static::createLocalDriver(array_merge($config, [
            'root' => $root,
        ])));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $fake;
    }

    /**
     * Replace the given disk with a persistent local testing disk.
     *
     * @param  string|null  $disk
<<<<<<< HEAD
     * @return \Illuminate\Filesystem\Filesystem
     */
    public static function persistentFake($disk = null)
    {
        $disk = $disk ?: self::$app['config']->get('filesystems.default');

        static::set($disk, $fake = self::createLocalDriver([
            'root' => storage_path('framework/testing/disks/'.$disk),
        ]));
=======
     * @param  array  $config
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public static function persistentFake($disk = null, array $config = [])
    {
        $disk = $disk ?: static::$app['config']->get('filesystems.default');

        static::set($disk, $fake = static::createLocalDriver(array_merge($config, [
            'root' => storage_path('framework/testing/disks/'.$disk),
        ])));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'filesystem';
    }
}
