#!/usr/bin/env ruby
# USAGE: ruby ./scripts/generate_redirect_jekyll.rb

# gem install mysql2
# gem install activerecord -v '4.2.3'
require 'mysql2'
require 'active_record'
require 'pry'
ActiveRecord::Base.logger = Logger.new(STDOUT)
ActiveRecord::Base.establish_connection(adapter: 'mysql2', encoding: 'utf8', host: 'localhost', database: 'ukrmap', username: 'root', password: 'Evrth2all1')

class Entry < ActiveRecord::Base; end

def save_page(path)
  if path.size > 1
    dir = File.join('./redirect_jekyll', path.split('/').detect{|d| !d.empty?})
    `mkdir #{dir}` if !dir.end_with?('.html') && !File.directory?(dir)
  end
  url = File.join('https://geomap.com.ua', path)
  html = <<-EOF
---
redirect_to: "#{url}"
---
EOF
  filepath = path.end_with?('.html') ? File.join('./redirect_jekyll', path) : File.join('./redirect_jekyll', path, 'index.html')
  File.open(filepath, 'w'){|f| f.write(html)}
end


save_page('/ru/')
save_page('/en/')
save_page('/be/')

Entry.where(level: 1).each do |entry|
  save_page("/uk-#{entry.category}/")
  save_page("/ru-#{entry.category}/")
  save_page("/en-#{entry.category}/")
  save_page("/be-#{entry.category}/")
end

Entry.where(level: 2).each do |entry|
  save_page("/uk-#{entry.course}/")
  save_page("/ru-#{entry.course}/")
  save_page("/en-#{entry.course}/")
  save_page("/be-#{entry.course}/")
end

Entry.where(level: 3).each do |entry|
  save_page("/uk-#{entry.course}/#{entry.id}.html")
  save_page("/ru-#{entry.course}/#{entry.id}.html")
  save_page("/en-#{entry.course}/#{entry.id}.html")
  save_page("/be-#{entry.course}/#{entry.id}.html")
end
