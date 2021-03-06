<?php
   function get_released_files ($package) {
      global $archive_directory;
      $pattern = 
         '/^' . $package .
         '(?P<subpackage>(?:-[[:alpha:]]\w*)*)' .
         '(?P<release>(?:-\d\w*(?:\.\d\w*)*)+)' .
         '(?:-(?P<usb>[[:alpha:]]+(?:-\d+(?:\.\d+)*)*))?' .
         '(?P<extension>(?:\.[[:alpha:]]\w*)+)' .
         '$/i';
      $dos_pattern =
         '/^' .
         '(?=\w{1,8}\.\w{1,3}$)' .
         '(?P<package>[[:alpha:]]+)' .
         '(?P<release>\d\w*)' .
         '(?P<extension>\.zip)' .
         '$/i';
      if ($directory = opendir($archive_directory)) {
         while (($name = readdir($directory))) {
            if (preg_match($pattern, $name, $matches)) {
               $release = substr($matches['release'], 1);
               $extensions = explode('.', $matches['extension']);
               switch ($extensions[1]) {
                  case 'src':
                  case 'tar':
                     $category = 'Source';
                     break;
                  default:
                     switch (end($extensions)) {
                        case 'rpm':
                           $category = 'Linux';
                           break;
                        case 'apk':
                           $category = 'Android';
                           break;
                        case 'exe':
                        case 'zip':
                           $category = 'Windows';
                           break;
                        default:
                           $category = 'unknown';
                           break;
                     }
                     break;
               }
            } elseif (preg_match($dos_pattern, $name, $matches)) {
               if (strncmp($package, $matches['package'], strlen($matches['package'])) != 0) continue;
               $release = $matches['release'];
               $offset = 1;
               $release = substr_replace($release, '.', $offset, 0);
               $category = 'DOS';
            } else {
               continue;
            }
            $components = explode('-', $release);
            $version = $components[0];
            reset($components);
            while (list($component_index, $component) = each($components)) {
               $numbers = explode('.', $component);
               reset($numbers);
               while (list($number_index, $number) = each($numbers)) {
                  $integer = true;
                  while (strlen($number)) {
                     $function = $integer? 'strspn': 'strcspn';
                     $element = ($length = $function($number, '0123456789'))? substr($number, 0, $length): '0';
                     if ($count = strspn($element, '0')) {
                        $element = ($count == strlen($element))? '0': substr($element, $count);
                     }
                     $elements[] = $element;
                     $number = substr($number, $length);
                     $integer = !$integer;
                  }
                  $numbers[$number_index] = $elements;
                  unset($elements);
               }
               $components[$component_index] = $numbers;
            }
            $path = $archive_directory . '/' . $name;
            $files[] = array(
               'name'       => $name,
               'path'       => $path,
               'size'       => filesize($path),
               'time'       => filemtime($path),
               'category'   => $category,
               'subpackage' => $matches['subpackage'],
               'release'    => $release,
               'version'    => $version,
               'components' => $components,
               'extension'  => $matches['extension']
            );
         }
         closedir($directory);
      }
      usort($files, 'compare_files_by_release');
      return $files;
   }
   function compare_files_by_release ($file1, $file2) {
      $components1 = $file1['components'];
      $components2 = $file2['components'];
      reset($components1);
      reset($components2);
      while (true) {
         $more1 = is_array(list($key, $numbers1) = each($components1));
         $more2 = is_array(list($key, $numbers2) = each($components2));
         if ($more1 != $more2) return $more1? 1: -1;
         if (!$more1) break;
         reset($numbers1);
         reset($numbers2);
         while (true) {
            $more1 = is_array(list($key, $elements1) = each($numbers1));
            $more2 = is_array(list($key, $elements2) = each($numbers2));
            if ($more1 != $more2) return $more1? 1: -1;
            if (!$more1) break;
            $integer = true;
            reset($elements1);
            reset($elements2);
            while (true) {
               $more1 = is_array(list($key, $element1) = each($elements1));
               $more2 = is_array(list($key, $element2) = each($elements2));
               if ($more1 != $more2) return ($more1 == $integer)? 1: -1;
               if (!$more1) break;
               if ($integer) {
                  if ($element1 < $element2) return -1;
                  if ($element1 > $element2) return 1;
               } else {
                  if (($relation = strcmp($element1, $element2))) return $relation;
               }
               $integer = !$integer;
            }
         }
      }
      return strcmp($file1['name'], $file2['name']);
   }

   $GLOBALS['archive_directory'] = 'archive';
   $GLOBALS['brltty_files'] = get_released_files('brltty');
   $GLOBALS['brlapi_files'] = get_released_files('(?:(?:java|ocaml|python|tcl)-)?brlapi');

   function get_version_files (&$package_files, $version) {
      reset($package_files);
      while (list($key, $file) = each($package_files)) {
         if (strcmp($version, $file['version']) == 0) {
            $files[] = $file;
         }
      }
      return $files;
   }
   function put_file_row (&$file) {
      $size = $file['size'];
      $scale = 0;
      $factor = 1000;

      while ($size >= $factor) {
         $size /= $factor;
         $scale++;
      }

      echo("<tr>\n");
      echo("<td align=\"left\"><a href=\"" . $file['path'] . "\"><code>" . $file['name'] . "</code></a></td>\n");
      echo("<td align=\"left\">" . $file['category'] . "</td>\n");
      echo("<td align=\"right\">" . round($size) . substr(' KMG', $scale, 1) . "</td>\n");
      echo("<td align=\"left\">" . date('Y-m-d', $file['time']) . "</td>\n");
      echo("</tr>\n");
   }
   function put_file_rows (&$files) {
      $all_files = array_reverse($files);

      while (list($key, $file) = each($all_files)) {
         put_file_row($file);
      }
   }
   function put_file_table (&$files) {
      echo("<table align=\"center\">\n");

      echo("<tr>\n");
      echo("<th>Name</th>\n");
      echo("<th>Category</th>\n");
      echo("<th>Size</th>\n");
      echo("<th>Date</th>\n");
      echo("</tr>\n");

      $all_files = array_reverse($files);
      $release_files = array();
      $previous_release = "";

      while (list($key, $file) = each($all_files)) {
         $next_release = $file['release'];
         if (strcmp($next_release, $previous_release) != 0) {
            put_file_rows($release_files);
            $release_files = array();
            $previous_release = $next_release;
         }
         $release_files[] = $file;
      }
      put_file_rows($release_files);

      echo("</table>\n");
   }

   function put_version ($package_name, &$package_files, $version_name, $version_description) {
      $files = get_version_files($package_files, $version_name);
      $date = date('F j, Y', $files[0]['time']);

      echo("<p>\n");
      echo("The $version_description version of <b>$package_name</b> is $version_name ($date).\n"); 
      echo("It can be downloaded in the following formats:\n"); 
      echo("</p>\n");

      put_file_table($files);
   }
   function put_latest_version ($package_name, &$package_files, $current_version) {
      $latest_release = end($package_files);
      $latest_version = $latest_release['version'];
      if ($latest_version != $current_version) {
         put_version($package_name, $package_files, $latest_version, 'latest beta');
      }
   }
   function put_current_version ($package_name, &$package_files, $current_version) {
      put_version($package_name, $package_files, $current_version, 'current production');
   }
   function put_versions ($package_name, &$package_files, $current_version) {
      put_latest_version($package_name, $package_files, $current_version);
      put_current_version($package_name, $package_files, $current_version);
   }
?>
