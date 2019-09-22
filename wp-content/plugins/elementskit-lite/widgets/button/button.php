<?php
namespace Elementor;

use \ElementsKit\Elementskit_Widget_Button_Handler as Handler;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;


class Elementskit_Widget_Button extends Widget_Base {

	public $base;

    public function get_name() {
        return Handler::get_name();
    }

    public function get_title() {
        return Handler::get_title();
    }

    public function get_icon() {
        return Handler::get_icon();
    }

    public function get_categories() {
        return Handler::get_categories();
    }

    protected function _register_controls() {


		$this->start_controls_section(
			'ekit_btn_section_content',
			array(
				'label' => esc_html__( 'Content', 'elementskit' ),
			)
		);

		$this->add_control(
			'ekit_btn_text',
			[
				'label' =>esc_html__( 'Label', 'elementskit' ),
				'type' => Controls_Manager::TEXT,
				'default' =>esc_html__( 'Learn more ', 'elementskit' ),
				'placeholder' =>esc_html__( 'Learn more ', 'elementskit' ),
				'dynamic' => [
                    'active' => true,
                ],
			]
		);


		$this->add_control(
			'ekit_btn_url',
			[
				'label' =>esc_html__( 'URL', 'elementskit' ),
				'type' => Controls_Manager::URL,
				'placeholder' =>esc_url('http://your-link.com'),
				'dynamic' => [
                    'active' => true,
                ],
				'default' => [
					'url' => '#',
					'is_external' => true,
                    'nofollow' => true,
				],
			]
		);

        $this->add_control(
            'ekit_btn_section_settings',
            [
                'label' => esc_html__( 'Settings', 'elementskit' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->add_control(
			'ekit_btn_icon',
			[
				'label' =>esc_html__( 'Icon', 'elementskit' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
        $this->add_control(
            'ekit_btn_icon_align',
            [
                'label' =>esc_html__( 'Icon Position', 'elementskit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' =>esc_html__( 'Before', 'elementskit' ),
                    'right' =>esc_html__( 'After', 'elementskit' ),
                ],
                'condition' => [
                    'ekit_btn_icon!' => '',
                ],
            ]
        );
		$this->add_responsive_control(
			'ekit_btn_align',
			[
				'label' =>esc_html__( 'Alignment', 'elementskit' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' =>esc_html__( 'Left', 'elementskit' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' =>esc_html__( 'Center', 'elementskit' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' =>esc_html__( 'Right', 'elementskit' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .ekit-btn-wraper' => 'text-align: {{VALUE}};',
				],
			]
		);
	    $this->add_control(
		    'ekit_btn_class',
		    [
			    'label' => esc_html__( 'Class', 'elementskit' ),
			    'type' => Controls_Manager::TEXT,
			    'placeholder' => esc_html__( 'Class Name', 'elementskit' ),
		    ]
	    );

	    $this->add_control(
		    'ekit_btn_id',
		    [
			    'label' => esc_html__( 'id', 'elementskit' ),
			    'type' => Controls_Manager::TEXT,
			    'placeholder' => esc_html__( 'ID', 'elementskit' ),
		    ]
	    );


		$this->end_controls_section();


        $this->start_controls_section(
			'ekit_btn_section_style',
			[
				'label' =>esc_html__( 'Button', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ekit_btn_text_padding',
			[
				'label' =>esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ekit_btn_typography',
				'label' =>esc_html__( 'Typography', 'elementskit' ),
				'selector' => '{{WRAPPER}} .elementskit-btn',
			]
		);

        $this->add_group_control(
        	Group_Control_Text_Shadow::get_type(),
        	[
        		'name' => 'ekit_btn_shadow',
        		'selector' => '{{WRAPPER}} .elementskit-btn',
        	]
        );

		$this->start_controls_tabs( 'ekit_btn_tabs_style' );

		$this->start_controls_tab(
			'ekit_btn_tabnormal',
			[
				'label' =>esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_responsive_control(
			'ekit_btn_text_color',
			[
				'label' =>esc_html__( 'Text Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
				'name'     => 'ekit_btn_bg_color',
				'default' => '',
				'selector' => '{{WRAPPER}} .elementskit-btn',
            )
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_btn_tab_button_hover',
			[
				'label' =>esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_responsive_control(
			'ekit_btn_hover_color',
			[
				'label' =>esc_html__( 'Text Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    array(
			    'name'     => 'ekit_btn_bg_hover_color',
			    'default' => '',
			    'selector' => '{{WRAPPER}} .elementskit-btn:before',
		    )
	    );

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();




        $this->start_controls_section(
			'ekit_btn_border_style_tabs',
			[
				'label' =>esc_html__( 'Border', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ekit_btn_border_style',
			[
				'label' => esc_html_x( 'Border Type', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'elementskit' ),
					'solid' => esc_html_x( 'Solid', 'Border Control', 'elementskit' ),
					'double' => esc_html_x( 'Double', 'Border Control', 'elementskit' ),
					'dotted' => esc_html_x( 'Dotted', 'Border Control', 'elementskit' ),
					'dashed' => esc_html_x( 'Dashed', 'Border Control', 'elementskit' ),
					'groove' => esc_html_x( 'Groove', 'Border Control', 'elementskit' ),
				],
				'default'	=> 'none',
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' => 'border-style: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'ekit_btn_border_dimensions',
			[
				'label' 	=> esc_html_x( 'Width', 'Border Control', 'elementskit' ),
				'type' 		=> Controls_Manager::DIMENSIONS,
				'condition'	=> [
					'ekit_btn_border_style!' => 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'xs_tabs_button_border_style' );
		$this->start_controls_tab(
			'ekit_btn_tab_border_normal',
			[
				'label' =>esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_responsive_control(
			'ekit_btn_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_btn_tab_button_border_hover',
			[
				'label' =>esc_html__( 'Hover', 'elementskit' ),
			]
		);
		$this->add_responsive_control(
			'ekit_btn_hover_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'ekit_btn_border_radius',
			[
				'label' =>esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '' ,
					'left' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'ekit_btn_box_shadow_style',
			[
				'label' =>esc_html__( 'Shadow', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
			  'name' => 'ekit_btn_box_shadow_group',
			  'selector' => '{{WRAPPER}} .elementskit-btn',
			]
		);


		$this->end_controls_section();

        $this->start_controls_section(
			'ekit_btn_iconw_style',
			[
				'label' =>esc_html__( 'Icon', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['ekit_btn_icon!' => '']
			]
		);
		$this->add_responsive_control(
			'ekit_btn_normal_icon_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'elementskit' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .elementskit-btn > i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'ekit_btn_normal_icon_padding_left',
			[
				'label' => esc_html__( 'Add space after icon', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn > i' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_btn_icon_align' => 'left'
				]
			]
		);
		$this->add_responsive_control(
			'ekit_btn_normal_icon_padding_right',
			[
				'label' => esc_html__( 'Padding Left', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' =>1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-btn > i' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_btn_icon_align' => 'right'
				]
			]
		);

        $this->add_responsive_control(
            'ekit_btn_normal_icon_vertical_align',
            array(
                'label'      => esc_html__( 'Move icon  Vertically', 'elementskit' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array(
                    'px', 'em', 'rem',
                ),
                'range'      => array(
                    'px' => array(
                        'min' => -20,
                        'max' => 20,
                    ),
                    'em' => array(
                        'min' => -5,
                        'max' => 5,
                    ),
                    'rem' => array(
                        'min' => -5,
                        'max' => 5,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} .elementskit-btn i' => ' -webkit-transform: translateY({{SIZE}}{{UNIT}}); -ms-transform: translateY({{SIZE}}{{UNIT}}); transform: translateY({{SIZE}}{{UNIT}})',
                ),
            )
        );

		$this->end_controls_section();
    }

    protected function render( ) {
        echo '<div class="ekit-wid-con" >';
            $this->render_raw();
        echo '</div>';
    }

    protected function render_raw( ) {
        $settings = $this->get_settings_for_display();

        $btn_text = $settings['ekit_btn_text'];
        $btn_class = ($settings['ekit_btn_class'] != '') ? $settings['ekit_btn_class'] : '';
        $btn_id = ($settings['ekit_btn_id'] != '') ? 'id='.$settings['ekit_btn_id'] : '';
        $icon_align = $settings['ekit_btn_icon_align'];
		$btn_url = (! empty( $settings['ekit_btn_url']['url'])) ? $settings['ekit_btn_url']['url'] : '';
		$btn_target = ( $settings['ekit_btn_url']['is_external']) ? '_blank' : '_self';
		$btn_nofollow = ( $settings['ekit_btn_url']['nofollow']) ? 'nofollow' : '';
		?>
		<div class="ekit-btn-wraper">
			<?php if($icon_align == 'right'): ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" rel="<?php echo esc_attr ( $btn_nofollow ); ?>" class="elementskit-btn <?php echo esc_attr( $btn_class ); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php echo esc_html( $btn_text ); ?>
					<?php if($settings['ekit_btn_icon'] != ''): ?><i class="<?php echo esc_attr( $settings['ekit_btn_icon'] ); ?>"></i><?php endif; ?>
				</a>
				<?php elseif ($icon_align == 'left') : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" rel="<?php echo esc_attr ( $btn_nofollow ); ?>" class="elementskit-btn <?php echo esc_attr( $btn_class); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php if($settings['ekit_btn_icon'] != ''): ?><i class="<?php echo esc_attr( $settings['ekit_btn_icon'] ); ?>"></i><?php endif; ?>
					<?php echo esc_html( $btn_text ); ?>
				</a>
				<?php else : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" rel="<?php echo esc_attr ( $btn_nofollow ); ?>" class="elementskit-btn <?php echo esc_attr( $btn_class); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php echo esc_html( $btn_text ); ?>
				</a>
			<?php endif; ?>
		</div>
        <?php
    }

    protected function _content_template() { }
}