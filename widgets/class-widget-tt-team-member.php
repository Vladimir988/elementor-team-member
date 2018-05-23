<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_TT_Team_Member extends Widget_Base {

	public function get_name() {
		return 'tt-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'elementor-custom-element' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	protected function _register_controls() {

		/**
		 * Tab Content
		 */
		$this->start_controls_section(
			'team_member_section_content',
			[
				'label'      => __( 'Content', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			]
		);
		$this->add_control(
			'member_image',
			[
				'label'   => __( 'Member Image', 'elementor-custom-element' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => Utils::get_placeholder_image_src(),
				),
			]
		);
		$this->add_control(
			'member_first_name',
			[
				'label'   => __( 'First Name', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Boris',
			]
		);
		$this->add_control(
			'member_last_name',
			[
				'label'   => __( 'Last Name', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Brolin',
			]
		);
		$this->add_control(
			'member_position',
			[
				'label'     => __( 'Position', 'elementor-custom-element' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Position',
			]
		);
		$this->add_control(
			'member_descr',
			[
				'label'     => __( 'Description', 'elementor-custom-element' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => 'Team Member Description',
			]
		);
		$this->add_control(
			'member_icon_list_show',
			array(
				'label'        => __( 'Show Social List', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-custom-element' ),
				'label_off'    => __( 'No', 'elementor-custom-element' ),
				'return_value' => 'yes',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'member_icon_list',
			[
				'label'   => '',
				'type'    => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'Facebook', 'elementor-custom-element' ),
						'icon' => 'fa fa-facebook',
					],
					[
						'text' => __( 'Twitter', 'elementor-custom-element' ),
						'icon' => 'fa fa-twitter',
					],
					[
						'text' => __( 'Linkedin', 'elementor-custom-element' ),
						'icon' => 'fa fa-linkedin',
					],
				],
				'fields'   => [
					[
						'name'  => 'text',
						'label' => __( 'Text', 'elementor-custom-element' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'List Item', 'elementor-custom-element' ),
						'default'     => __( 'List Item', 'elementor-custom-element' ),
					],
					[
						'name'  => 'icon',
						'label' => __( 'Icon', 'elementor-custom-element' ),
						'type'  => Controls_Manager::ICON,
						'label_block' => true,
						'default'     => 'fa fa-facebook',
					],
					[
						'name'  => 'link',
						'label' => __( 'Link', 'elementor-custom-element' ),
						'type'  => Controls_Manager::URL,
						'label_block' => true,
						'default'     => array(
							'url'       => '#',
						),
						'placeholder' => __( 'https://your-link.com', 'elementor-custom-element' ),
					],
					[
						'name'  => 'label_visible',
						'label' => __( 'Label visible', 'elementor-custom-element' ),
						'type'  => Controls_Manager::SWITCHER,
						'label_on'     => __( 'Yes', 'elementor-custom-element' ),
						'label_off'    => __( 'No', 'elementor-custom-element' ),
						'return_value' => 'yes',
						'default'      => 'false',
					],
				],
				'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
				'condition' => array(
					'member_icon_list_show' => 'yes',
				),
			]
		);
		$this->add_control(
			'member_button_text',
			[
				'label'       => __( 'Button Text', 'elementor-custom-element' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Read More', 'elementor-custom-element' ),
			]
		);
		$this->add_control(
			'member_button_url',
			[
				'label'       => __( 'Button Url', 'elementor-custom-element' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default'     => array(
					'url'       => '#',
				),
			]
		);
		$this->end_controls_section();

		/**
		 * Tab Style
		 * 
		 * Section General
		 */
		$this->start_controls_section(
			'team_member_section_general',
			array(
				'label'      => __( 'General', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'container_background',
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'container_border',
				'label'       => __( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-team-member-inner',
			)
		);
		$this->add_responsive_control(
			'container_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'container_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'container_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'container_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-inner',
			)
		);
		$this->end_controls_section();

		/**
		 * Section Imaga
		 */
		$this->start_controls_section(
			'team_member_section_image',
			array(
				'label'      => __( 'Image', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'custom_image_size',
			array(
				'label'        => __( 'Custom size', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-custom-element' ),
				'label_off'    => __( 'No', 'elementor-custom-element' ),
				'return_value' => 'yes',
				'default'      => 'false',
			)
		);
		$this->add_responsive_control(
			'image_width',
			array(
				'label'      => __( 'Width', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 50,
						'max' => 800,
					),
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-img-wrap' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.tt-team-member-figure'   => 'width: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'image_height',
			array(
				'label'      => __( 'Height', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 50,
						'max' => 800,
					),
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-img-wrap' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ' . '.tt-team-member-figure'   => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'image_border',
				'label'       => __( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'  => '{{WRAPPER}} ' . '.tt-team-member-img-wrap',
			)
		);
		$this->add_responsive_control(
			'image_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-img-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ' . '.tt-team-member-figure'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-img-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-img-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'image_box_shadow',
				'exclude' => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-img-wrap',
			)
		);
		$this->end_controls_section();

		/**
		 * Section Name
		 */
		$this->start_controls_section(
			'team_member_section_name',
			array(
				'label'      => __( 'Name', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_name' );
		$this->start_controls_tab(
			'tab_first_name',
			array(
				'label' => __( 'First name', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'first_name_color',
			array(
				'label'  => __( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-name' . ' .tt-team-member-first-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'first_name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-name' . ' .tt-team-member-first-name',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_last_name',
			array(
				'label' => __( 'Last name', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'last_name_color',
			array(
				'label'  => __( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-name' . ' .tt-team-member-last-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'last_name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-name' . ' .tt-team-member-last-name',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'name_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'name_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'name_text_alignment',
			array(
				'label'   => __( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => __( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-name' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Position
		 */
		$this->start_controls_section(
			'team_member_section_position',
			array(
				'label'      => __( 'Position', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'position_color',
			array(
				'label'  => __( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-position' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'position_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-position',
			)
		);
		$this->add_responsive_control(
			'position_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'position_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'position_text_alignment',
			array(
				'label'   => __( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => __( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-position' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Description
		 */
		$this->start_controls_section(
			'team_member_section_description',
			array(
				'label'      => __( 'Description', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'  => __( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-description',
			)
		);
		$this->add_responsive_control(
			'description_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'description_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'description_text_alignment',
			array(
				'label'   => __( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => __( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-description' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Social List
		 */
		$this->start_controls_section(
			'team_member_section_social_list',
			array(
				'label'      => __( 'Social List', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'social_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->start_controls_tabs( 'tabs_social_icon_style' );
		$this->start_controls_tab(
			'tab_social_icon_normal',
			array(
				'label' => esc_html__( 'Normal', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'social_icon_color',
			array(
				'label' => esc_html__( 'Icon Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_icon_bg_color',
			array(
				'label' => esc_html__( 'Icon Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_label_color',
			array(
				'label' => esc_html__( 'Label Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-label' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => __('Label Typography', 'elementor-custom-element'),
				'name'     => 'social_icon_label_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-socials-label',
			)
		);
		$this->add_responsive_control(
			'social_icon_font_size',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_size',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'social_icon_border',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner',
			)
		);
		$this->add_control(
			'social_icon_box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_box_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'social_icon_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_social_icon_hover',
			array(
				'label' => esc_html__( 'Hover', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'social_icon_color_hover',
			array(
				'label' => esc_html__( 'Icon Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover i' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_icon_bg_color_hover',
			array(
				'label' => esc_html__( 'Icon Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'social_label_color_hover',
			array(
				'label' => esc_html__( 'Label Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-label' . ':hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => __('Label Typography', 'elementor-custom-element'),
				'name'     => 'social_icon_label_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-socials-label' . ':hover',
			)
		);
		$this->add_responsive_control(
			'social_icon_font_size_hover',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_size_hover',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'social_icon_border_hover',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover',
			)
		);
		$this->add_control(
			'social_icon_box_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'social_icon_box_margin_hover',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ':hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'social_icon_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-socials-icon' . ' .inner:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		/**
		 * Section Button
		 */
		$this->start_controls_section(
			'team_member_section_button',
			array(
				'label'      => __( 'Button', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'button_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button-container' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->start_controls_tabs( 'tabs_button' );
		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => esc_html__( 'Normal', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elementor-custom-element' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.tt-team-member-button',
			)
		);
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-team-member-button',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-button',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => esc_html__( 'Hover', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'button_bg_color_hover',
			array(
				'label' => esc_html__( 'Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' . ':hover' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_color_hover',
			array(
				'label'     => esc_html__( 'Text Color', 'elementor-custom-element' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' . ':hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}}  ' . '.tt-team-member-button' . ':hover',
			)
		);
		$this->add_responsive_control(
			'button_padding_hover',
			array(
				'label'      => esc_html__( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' . ':hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_margin_hover',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' . ':hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'button_border_radius_hover',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-team-member-button' . ':hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border_hover',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-team-member-button' . ':hover',
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} ' . '.tt-team-member-button' . ':hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		/**
		 * Section Order
		 */
		$this->start_controls_section(
			'team_member_section_order',
			array(
				'label'      => __( 'Content Order', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'image_order',
			array(
				'label'   => esc_html__( 'Image Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-img-wrap' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'name_order',
			array(
				'label'   => esc_html__( 'Name Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-name' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'position_order',
			array(
				'label'   => esc_html__( 'Position Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-position' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'description_order',
			array(
				'label'   => esc_html__( 'Description Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-description' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'social_list_order',
			array(
				'label'   => esc_html__( 'Social List Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-socials' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_order',
			array(
				'label'   => esc_html__( 'Button Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-team-member-button-container' => 'order: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		?>
			<div class="tt-team-member">
				<div class="tt-team-member-inner">
					<div class="tt-team-member-content">
						<div class="tt-team-member-img-wrap">
							<?php echo $this->get_image(); ?>
						</div>
						<?php
							echo $this->get_member_name();
							echo $this->get_member_position();
							echo $this->get_member_description();
							echo $this->get_member_social_icon_list();
							echo $this->get_member_action_button();
						?>
					</div>
				</div>
			</div>
		<?php
	}

	public function get_image() {
		$image = $this->get_settings( 'member_image' );
		if ( empty( $image['id'] ) && empty( $image['url'] ) ) {
			return;
		}
		$format = apply_filters('tt-team-member-image', '<figure class="tt-team-member-figure"><img class="tt-team-member-img" src="%s" alt=""></figure>');
		return sprintf( $format, $image['url'] );
	}

	public function get_member_name() {
		$first_name = $this->get_settings( 'member_first_name' );
		$last_name  = $this->get_settings( 'member_last_name' );
		$first_name_html = '';
		$last_name_html = '';
		if ( empty( $first_name ) && empty( $last_name ) ) {
			return;
		}
		if ( !empty( $first_name ) ) {
			$first_name_html = sprintf( '<span class="tt-team-member-first-name">%s</span>', $first_name );
		}
		if ( !empty( $last_name ) ) {
			$last_name_html = sprintf( '<span class="tt-team-member-last-name"> %s</span>', $last_name );
		}
		$render = apply_filters( 'tt-team-member-name-format', '<h3 class="tt-team-member-name">%1$s%2$s</h3>' );
		return sprintf( $render, $first_name_html, $last_name_html );
	}

	public function get_member_position() {
		$position = $this->get_settings( 'member_position' );
		if ( empty( $position ) ) {
			return false;
		}
		$render = apply_filters( 'tt-team-member-position-format', '<p class="tt-team-member-position">%s</p>' );
		return sprintf( $render, $position );
	}

	public function get_member_description() {
		$description = $this->get_settings( 'member_descr' );
		if ( empty( $description ) ) {
			return false;
		}
		$render = apply_filters( 'tt-team-member-description-format', '<p class="tt-team-member-description">%s</p>' );
		return sprintf( $render, $description );
	}

	public function get_member_social_icon_list() {
		$social_icon_list = $this->get_settings( 'member_icon_list' );
		if ( empty( $social_icon_list ) ) {
			return false;
		}
		if('yes' !== $this->get_settings('member_icon_list_show')) {
			return false;
		}
		$icon_list = '';
		foreach ( $social_icon_list as $key => $icon_data ) {
			$label = '';
			if ( ! empty( $icon_data['link']['url'] ) ) {
				$icon = sprintf( '<div class="tt-team-member-socials-icon"><div class="inner"><i class="%s"></i></div></div>', $icon_data['icon'] );
				if ('yes' === $icon_data['label_visible']) {
					$label = sprintf( '<div class="tt-team-member-socials-label">%s</div>', $icon_data['text'] );
				}
				if ( $icon ) {
					if ( $icon_data['link']['is_external'] ) {
						$target = 'target="_blank"';
					}
					if ( $icon_data['link']['nofollow'] ) {
						$rel = 'rel="nofollow"';
					}
					$icon_list .= sprintf( '<div class="tt-team-member-socials-item"><a href="%1$s" %3$s %4$s>%2$s%5$s</a></div>', $icon_data['link']['url'], $icon, $target, $rel, $label );
				}
			}
		}
		$render = apply_filters( 'tt-team-member-social-list-format', '<div class="tt-team-member-socials">%1$s</div>' );
		return sprintf( $render, $icon_list );
	}

	public function get_member_action_button() {
		$button_text = $this->get_settings( 'member_button_text' );
		$button_url  = $this->get_settings( 'member_button_url' );
		if ( empty( $button_url ) ) {
			return false;
		}
		if ( is_array( $button_url ) && empty( $button_url['url'] ) ) {
			return false;
		}
		$this->add_render_attribute( 'url', 'class', array(
			'elementor-button',
			'elementor-size-md',
			'tt-team-member-button',
		) );
		if ( is_array( $button_url ) ) {
			$this->add_render_attribute( 'url', 'href', $button_url['url'] );
			if ( $button_url['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}
			if ( ! empty( $button_url['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}
		} else {
			$this->add_render_attribute( 'url', 'href', $button_url );
		}
		$render = apply_filters( 'tt-team-member-button-format', '<div class="tt-team-member-button-container"><a %1$s>%2$s</a></div>' );
		return sprintf( $render, $this->get_render_attribute_string( 'url' ), $button_text );
	}

	protected function content_template() {}
	public function render_plain_content($instance = []) {}
}
	Plugin::instance()->widgets_manager->register_widget_type(new Widget_TT_Team_Member);
?>