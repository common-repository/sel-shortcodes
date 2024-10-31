// Tinymce Button Scripts
(function() {

  tinymce.PluginManager.add('selthemes_mce_button', function( editor, url ) {
		editor.addButton( 'selthemes_mce_button', {
			//text: 'Shortz',
			icon: 'shortz-mce-icon',
			type: 'menubutton',
			menu: [

        // Button
				{
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Add Button',
							body: [
								{
									type: 'textbox',
									name: 'buttonlabel',
									label: 'Button Label',
									value: 'Button'
								},

                {
									type: 'textbox',
									name: 'buttonurl',
									label: 'Button URL',
									value: 'selthemes.com'
								},

								{
									type: 'listbox',
									name: 'buttoncolor',
									label: 'Color',
									'values': [
										{text: 'Primary', value: 'st-btn-primary'},
                    {text: 'Secondary', value: 'st-btn-secondary'},
										{text: 'Link', value: 'st-btn'},
                    {text: 'Success', value: 'st-btn-success'},
										{text: 'Info', value: 'st-btn-info'},
                    {text: 'Warning', value: 'st-btn-warning'},
                    {text: 'Danger', value: 'st-btn-danger'},
									]
								},

                {
									type: 'listbox',
									name: 'buttonsize',
									label: 'Size',
									'values': [
                    {text: 'Default', value: 'st-btn-default' },
										{text: 'Small', value: 'st-btn-small'},
                    {text: 'Large', value: 'st-btn-large'},
                    {text: 'Expanded', value: 'st-btn-expanded'},
									]
								},

                {
									type: 'listbox',
									name: 'buttonstyle',
									label: 'Style',
									'values': [
										{text: 'Default', value: 'st-btn' },
										{text: 'Outline', value: 'st-btn-outline'}
									]
								},

                {
									type: 'listbox',
									name: 'buttontarget',
									label: 'Target',
									'values': [
										{text: 'Open in New Tab / Window', value: '_blank' },
										{text: 'Open in Same Tab / Window', value: '_self'}
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[st_button url="' + e.data.buttonurl + '" label="' + e.data.buttonlabel + '" color="' + e.data.buttoncolor + '"  size="' + e.data.buttonsize + '"  style="' + e.data.buttonstyle + '"  target="' + e.data.buttontarget + '"]');
							}
						});
					}
				}, // End Button
        // End Button

        //Callouts
        {
					text: 'Callouts',
          onclick: function() {
            editor.windowManager.open( {
							title: 'Add Callout Box',
              body: [
                {
                  type:  'textbox',
									name:  'callout_title',
									label: 'Title',
									value: 'The Callout Title'
                },

                {
									type: 'textbox',
									name: 'callout_content',
									label: 'Content',
									value: 'Add your callout texts',
                                    multiline: true,
									minWidth: 300,
									minHeight: 100
								},

                {
									type: 'listbox',
									name: 'callout_color',
									label: 'Color',
									'values': [
                    {text: 'Default', value: ''},
										{text: 'Primary', value: 'callouts-primary'},
                    {text: 'Secondary', value: 'callouts-secondary'},
                    {text: 'Info', value: 'callouts-info'},
										{text: 'Danger', value: 'callouts-danger'},
                    {text: 'Warning', value: 'callouts-warning'},
                    {text: 'Success', value: 'callouts-success'},
									]
								},
              ],
              onsubmit: function( e ) {
								editor.insertContent( '[st_callouts title="' + e.data.callout_title + '" color="' + e.data.callout_color + '"]' + e.data.callout_content + '[/st_callouts]');
							}
            });
          }
        },
        // End Callouts

        //TABS
        {
					text: 'Tabs',
          menu: [
						{
							text: 'Add Tab Group',
							onclick: function() {
								editor.insertContent('[st_tabgroup] [/st_tabgroup]');
							}
						},
						{
							text: 'Add Tabs',
              onclick: function() {
                editor.windowManager.open( {
    							title: 'Add Tabs',
                  body: [
                    {
                      type:  'textbox',
    									name:  'tab_title',
    									label: 'Tab Title',
    									value: 'Tab Title'
                    },
                    {
                      type:  'textbox',
    									name:  'tab_content',
    									label: 'Tab Content',
    									value: 'Tab Content',
                      multiline: true,
    									minWidth: 300,
    									minHeight: 100
                    },
                  ],
                  onsubmit: function( e ) {
    								editor.insertContent( '[st_tab title="' + e.data.callout_title + '"]' + e.data.tab_content + '[/st_tab]');
    							}
                });
              }
						}
					]
        },
        // End Tabs

        // Accordion
        {
					text: 'Accordion',
          menu: [
						{
							text: 'Add Accordion Group',
							onclick: function() {
								editor.insertContent('[st_accordion_group] [/st_accordion_group]');
							}
						},
						{
							text: 'Add Accordion',
              onclick: function() {
                editor.windowManager.open( {
    							title: 'Add an Accordion',
                  body: [
                    {
                      type:  'textbox',
    									name:  'accordion_title',
    									label: 'Accordion Title',
    									value: 'Accordion Title'
                    },
                    {
                      type:  'textbox',
    									name:  'accordion_content',
    									label: 'Accordion Content',
    									value: 'Accordion Content',
                      multiline: true,
    									minWidth: 300,
    									minHeight: 100
                    },
                  ],
                  onsubmit: function( e ) {
    								editor.insertContent( '[st_accordion title="' + e.data.accordion_title + '"]' + e.data.accordion_content + '[/st_accordion]');
    							}
                });
              }
						}
					]
        },
        // End Accordion

        // GRID
        {
			text: 'Grid',
            menu: [
				{
					text: 'Add Grid Row',
					onclick: function() {
						editor.insertContent('[st_row] [/st_row]');
					}
				},
				{
					text: 'Add Columns',
                    onclick: function() {
                editor.windowManager.open( {
    							title: 'Add an Accordion',
                  body: [
                    {
                      type:  'textbox',
    									name:  'columns',
    									label: 'Add column',
    									value: '6'
                    },
                    {
                      type:  'textbox',
    									name:  'column_content',
    									label: 'Columns Content',
    									value: 'Add Columns content here',
                      multiline: true,
    									minWidth: 400,
    									minHeight: 300
                    },
                  ],
                  onsubmit: function( e ) {
    								editor.insertContent( '[st_col column="' + e.data.columns + '"]' + e.data.column_content + '[/st_col]');
    							}
                });
              }
						}
					]
        },

        // End Grid

			]
		});
	});

})();
