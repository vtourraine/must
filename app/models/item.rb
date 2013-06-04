class Item < ActiveRecord::Base
  attr_accessible :authors, :checked_on, :favorite, :links, :medium, :next, :note, :published_on, :tags, :title
end
