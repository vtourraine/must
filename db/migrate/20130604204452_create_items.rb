class CreateItems < ActiveRecord::Migration
  def change
    create_table :items do |t|
      t.string :title
      t.string :medium
      t.string :tags
      t.string :authors
      t.date :published_on
      t.text :links
      t.text :note
      t.date :checked_on
      t.boolean :favorite
      t.boolean :next

      t.timestamps
    end
  end
end
