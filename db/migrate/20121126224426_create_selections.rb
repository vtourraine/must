class CreateSelections < ActiveRecord::Migration
  def change
    create_table :selections do |t|
      t.string :month_id

      t.timestamps
    end
  end
end
