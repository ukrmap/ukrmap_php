#!/usr/bin/env ruby
# USAGE: ruby ./scripts/generate_static_site.rb

# gem install mysql2
# gem install activerecord -v '4.2.3'
require 'open-uri'
require 'nokogiri'
require 'mysql2'
require 'active_record'
require 'pry'
ActiveRecord::Base.logger = Logger.new(STDOUT)
ActiveRecord::Base.establish_connection(adapter: 'mysql2', encoding: 'utf8', host: 'localhost', database: 'ukrmap', username: 'root', password: 'Evrth2all1')

class Entry < ActiveRecord::Base; end

def save_page(path)
  if path.size > 1
    dir = File.join('./static_site', path.split('/').detect{|d| !d.empty?})
    `mkdir #{dir}` if !dir.end_with?('.html') && !File.directory?(dir)
  end
  url = File.join('http://localhost', path)
  html = open(url).read
  filepath = path.end_with?('.html') ? File.join('./static_site', path) : File.join('./static_site', path, 'index.html')
  File.open(filepath, 'w'){|f| f.write(html)}
end

def generate_sitemap_xml
  builder = Nokogiri::XML::Builder.new(encoding: 'UTF-8') do |xml|
    xml.urlset(xmlns: "http://www.sitemaps.org/schemas/sitemap/0.9") do
      xml.url{xml.loc "https://geomap.com.ua/"}
      Entry.where(level: 1).each do |entry|
        xml.url{xml.loc "https://geomap.com.ua/uk-#{entry.category}/"}
        xml.url{xml.loc "https://geomap.com.ua/ru-#{entry.category}/"}
        xml.url{xml.loc "https://geomap.com.ua/en-#{entry.category}/"}
        xml.url{xml.loc "https://geomap.com.ua/be-#{entry.category}/"}
      end
      Entry.where(level: 2).each do |entry|
        xml.url{xml.loc "https://geomap.com.ua/uk-#{entry.course}/"}
        xml.url{xml.loc "https://geomap.com.ua/ru-#{entry.course}/"}
        xml.url{xml.loc "https://geomap.com.ua/en-#{entry.course}/"}
        xml.url{xml.loc "https://geomap.com.ua/be-#{entry.course}/"}
      end
      Entry.where(level: 3).each do |entry|
        xml.url{xml.loc "https://geomap.com.ua/uk-#{entry.course}/#{entry.id}.html"}
        xml.url{xml.loc "https://geomap.com.ua/ru-#{entry.course}/#{entry.id}.html"}
        xml.url{xml.loc "https://geomap.com.ua/en-#{entry.course}/#{entry.id}.html"}
        xml.url{xml.loc "https://geomap.com.ua/be-#{entry.course}/#{entry.id}.html"}
      end
    end
  end
  File.open(File.join('./static_site', 'sitemap.xml'), 'w'){|f| f.write(builder.to_xml)}
end

# Copy css, js, images, robots.txt
# `rm -rf ./static_site`
# `mkdir ./static_site`
# `cp -r ./css ./static_site/css`
# `cp -r ./js ./static_site/js`
# `cp -r ./images ./static_site/images`
# `cp ./robots.txt ./static_site/robots.txt`
# `cp ./favicon.ico ./static_site/favicon.ico`

# File.open(File.join('./static_site', '.gitignore'), 'w'){|f| f.write(".DS_Store\n")}

# generate_sitemap_xml
save_page('404.html')

save_page('/')
save_page('/ru')
save_page('/en')
save_page('/be')

Entry.where(level: 1).each do |entry|
  save_page("/uk-#{entry.category}")
  save_page("/ru-#{entry.category}")
  save_page("/en-#{entry.category}")
  save_page("/be-#{entry.category}")
end

Entry.where(level: 2).each do |entry|
  save_page("/uk-#{entry.course}")
  save_page("/ru-#{entry.course}")
  save_page("/en-#{entry.course}")
  save_page("/be-#{entry.course}")
end

Entry.where(level: 3).each do |entry|
  save_page("/uk-#{entry.course}/#{entry.id}.html")
  save_page("/ru-#{entry.course}/#{entry.id}.html")
  save_page("/en-#{entry.course}/#{entry.id}.html")
  save_page("/be-#{entry.course}/#{entry.id}.html")
end
