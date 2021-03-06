# execute 'apt-get update'
exec { 'apt-update':                    # exec resource named 'apt-update'
  command => '/usr/bin/apt-get update'  # command this resource will run
}

# install apache2 package
package { 'apache2':
  require => Exec['apt-update'],        # require 'apt-update' before installing
  ensure => installed,
}

# ensure apache2 service is running
service { 'apache2':
  ensure => running,
}

# install mysql-server package
package { 'mysql-server':
  require => Exec['apt-update'],        # require 'apt-update' before installing
  ensure => installed,
}

# ensure mysql service is running
  service { 'mysql':
    ensure  => running,
    require => Package['mysql-server'],
  }

# install php5 package
package { 'php5':
  require => Exec['apt-update'],        # require 'apt-update' before installing
  ensure => installed,
}

exec { 'composer':                    # exec resource named 'apt-update'
  command => '/usr/bin/php -r "readfile("https://getcomposer.org/installer");" | php'  # command this resource will run
}
exec { 'login':                    # exec resource named 'apt-update'
  command => '/usr/bin/mysql -u root -p'
}
#exec { 'create':                    # exec resource named 'apt-update'
 # command => '/usr/bin/mysql -u root -p CREATE DATABASE IF NOT EXISTS directory'
#}
#exec { 'import':                    # exec resource named 'apt-update'
 # command => '/usr/bin/mysql -u root -p directory < /vagrant/Database\ Backup/directory.sql'
#}