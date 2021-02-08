<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_ProgressionElementsPostList extends Widget_Base {

	
	public function get_name() {
		return 'progression-blog-post-list';
	}

	public function get_title() {
		return esc_html__( 'Crowdfunding Posts - Funlin', 'progression-elements-funlin' );
	}

	public function get_icon() {
		return 'eicon-post-list progression-studios-funlin-pe';
	}

   public function get_categories() {
		return [ 'progression-elements-funlin-cat' ];
	}
	
	public function get_script_depends() { 
		return [ 'boosted_elements_progression_masonry_js' ]; 
	}
	
	function Widget_ProgressionElementsPostList($widget_instance){
		
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_global_options',
  			[
  				'label' => esc_html__( 'Post Settings', 'progression-elements-funlin' )
  			]
  		);
		
		
		$this->add_control(
			'progression_main_post_count',
			[
				'label' => esc_html__( 'Post Count', 'progression-elements-funlin' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '12',
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_image_grid_column_count',
			[
  				'label' => esc_html__( 'Columns', 'progression-elements-funlin' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,				
				'desktop_default' => '33.330%',
				'tablet_default' => '50%',
				'mobile_default' => '100%',
				'options' => [
					'100%' => esc_html__( '1 Column', 'progression-elements-funlin' ),
					'50%' => esc_html__( '2 Column', 'progression-elements-funlin' ),
					'33.330%' => esc_html__( '3 Columns', 'progression-elements-funlin' ),
					'25%' => esc_html__( '4 Columns', 'progression-elements-funlin' ),
					'20%' => esc_html__( '5 Columns', 'progression-elements-funlin' ),
					'16.67%' => esc_html__( '6 Columns', 'progression-elements-funlin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-item' => 'width: {{VALUE}};',
				],
				'render_type' => 'template'
			]
		);
		
		
  		$this->add_responsive_control(
  			'progression_elements_image_grid_margin',
  			[
  				'label' => esc_html__( 'Margin', 'progression-elements-funlin' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 22,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-margins' => 'margin-left:-{{SIZE}}px; margin-right:-{{SIZE}}px;',
					'{{WRAPPER}} .progression-masonry-padding-blog' => 'padding: {{SIZE}}px;',
				],
				'render_type' => 'template'
  			]
  		);
		
		

		$this->add_control(
			'boosted_post_list_masonry',
			[
				'label' => esc_html__( 'Masonry Layout', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_list_pagination',
			[
				'label' => esc_html__( 'Post Pagination', 'progression-elements-funlin' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no-pagination',
				'options' => [
					'no-pagination' => esc_html__( 'No Pagination', 'progression-elements-funlin' ),
					'default' => esc_html__( 'Default Pagination', 'progression-elements-funlin' ),
					'load-more' => esc_html__( 'Load More Posts', 'progression-elements-funlin' ),
					'infinite-scroll' => esc_html__( 'Inifinite Scroll', 'progression-elements-funlin' ),
				],
			]
		);
		
		
		$this->add_control(
			'progression_main_post_load_more',
			[
				'label' => esc_html__( 'Load More Text', 'progression-elements-funlin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'MORE PROJECTS',
				'condition' => [
					'progression_elements_post_list_pagination' => 'load-more',
				],
			]
		);
		
		
		
		
		
		

		
		$this->end_controls_section();
		
  		$this->start_controls_section(
  			'section_title_layout_options',
  			[
  				'label' => esc_html__( 'Post Layout', 'progression-elements-funlin' )
  			]
  		);
		
		$this->add_control(
			'progression_studios_display_cat',
			[
				'label' => esc_html__( 'Display Categories', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_author_avatar',
			[
				'label' => esc_html__( 'Display Author Avatar', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_author_text',
			[
				'label' => esc_html__( 'Display Author Text', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'progression_studios_display_percent_raised',
			[
				'label' => esc_html__( 'Display Percent Raised', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_text_raised',
			[
				'label' => esc_html__( 'Display Text Raised', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_days_to_go',
			[
				'label' => esc_html__( 'Display Days to Go', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		
		$this->end_controls_section();
  		
		
  		$this->start_controls_section(
  			'section_title_secondary_options',
  			[
  				'label' => esc_html__( 'Post Query', 'progression-elements-funlin' )
  			]
  		);
		
	
		
		$this->add_control(
			'progression_post_cats',
			[
				'label' => esc_html__( 'Narrow by Category', 'progression-elements-funlin' ),
				'description' => esc_html__( 'Choose a category to display posts', 'progression-elements-funlin' ),
				'label_block' => true,
				'multiple' => true,
				'type' => Controls_Manager::SELECT2,
				'options' => funlin_elements_post_type_categories(),
			]
		);
		
		

		$this->add_control(
			'progression_elements_post_order_sorting',
			[
				'label' => esc_html__( 'Order By', 'progression-elements-funlin' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => esc_html__( 'Default - Date', 'progression-elements-funlin' ),
					'title' => esc_html__( 'Post Title', 'progression-elements-funlin' ),
					'menu_order' => esc_html__( 'Menu Order', 'progression-elements-funlin' ),
					'modified' => esc_html__( 'Last Modified', 'progression-elements-funlin' ),
					'rand' => esc_html__( 'Random', 'progression-elements-funlin' ),
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_order',
			[
				'label' => esc_html__( 'Order', 'progression-elements-funlin' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'progression-elements-funlin' ),
					'DESC' => esc_html__( 'Descending', 'progression-elements-funlin' ),
				],
			]
		);
		
		$this->add_control(
			'progression_main_offset_count',
			[
				'label' => esc_html__( 'Offset Count', 'progression-elements-funlin' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
				'description' => esc_html__( 'Use this to skip over posts (Example: 3 would skip the first 3 posts.)', 'progression-elements-funlin' ),
			]
		);
	
		
		
		$this->add_control(
			'progression_elements_post_sorting',
			[
				'label' => esc_html__( 'Category Sorting', 'progression-elements-funlin' ),
				'description' => esc_html__( 'Sort by Post Categories', 'progression-elements-funlin' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_filtering_text',
			[
				'label' => esc_html__( 'Sorting Text for "All Posts"', 'progression-elements-funlin' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'All', 'progression-elements-funlin' ),
				'conditions' => [
					'terms' => [
						[
							'name' => 'progression_elements_post_sorting',
							'operator' => '==',
							'value' => 'yes',
						],
					],
				],
			]
		);
		
		
		$this->end_controls_section();
		
	
	
	
		$this->start_controls_section(
			'progression_elements_section_main_styles',
			[
				'label' => esc_html__( 'Main Styles', 'progression-elements-funlin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_title',
			[
				'label' => esc_html__( 'Title', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_title_color',
			[
				'label' => esc_html__( 'Title Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_title_color_hover',
			[
				'label' => esc_html__( 'Title Hover Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_title_margin',
			[
				'label' => esc_html__( 'Title Padding', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_meta',
			[
				'label' => esc_html__( 'Author', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_meta_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-shop-author-byline',
			]
		);
		

		
		
		$this->add_control(
			'progression_elements_traditional_meta_color',
			[
				'label' => esc_html__( 'Author Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-author-byline' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_meta_link_color',
			[
				'label' => esc_html__( 'Author Link', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-author-byline a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_meta_color_hover',
			[
				'label' => esc_html__( 'Author Link Hover', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-author-byline a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_post_meta_margin',
			[
				'label' => esc_html__( 'Author Padding', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-author-byline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_content',
			[
				'label' => esc_html__( 'Content', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_content_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-blog-content',
			]
		);
		

  		$this->add_responsive_control(
  			'progression_elements_default_content_border_radius',
  			[
  				'label' => esc_html__( 'Border Radius', 'progression-elements-funlin' ),
  				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .funlin-progression-crowdfunding-elementor .progression-studios-store-image-index img' => 'border-top-right-radius: {{SIZE}}px; border-top-left-radius: {{SIZE}}px;',
					'{{WRAPPER}} .progression-studios-index-shadow ' => 'border-radius: {{SIZE}}px;',
					'{{WRAPPER}} .progression-studios-shop-index-text' => 'border-bottom-right-radius: {{SIZE}}px; border-bottom-left-radius: {{SIZE}}px;',
				],
  			]
  		);
		
		$this->add_control(
			'progression_elements_traditional_border_color',
			[
				'label' => esc_html__( 'Content Border', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-index-text' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_traditional_content_bg',
			[
				'label' => esc_html__( 'Content Background', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-index-text' => 'background: {{VALUE}}',
				],
			]
		);
		

		$this->add_responsive_control(
			'progression_elements_post_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-shop-index-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
	

		
		$this->end_controls_section();
		
		
		
		
		
		
		$this->start_controls_section(
			'section_styles_overlay_styles',
			[
				'label' => esc_html__( 'Fundraising Styles', 'progression-elements-funlin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
  		
		
		$this->add_control(
			'progression_elements_overlay_image_color',
			[
				'label' => esc_html__( 'Percent Graphic Background', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpneo-raised-bar #neo-progressbar' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_overlay_image_color_hover',
			[
				'label' => esc_html__( 'Percent Graphic Selected', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpneo-raised-bar #neo-progressbar > div' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_title_margin_overlay',
			[
				'label' => esc_html__( 'Percent Graphic Margin', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpneo-raised-bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		

		
		
		$this->add_control(
			'progression_elements_heading_title_overlay',
			[
				'label' => esc_html__( 'Percent Raised Text', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_title_typography_overlay',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-raised-percent',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_title_color_overlay',
			[
				'label' => esc_html__( 'Percent Raised Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-raised-percent' => 'color: {{VALUE}}',
				],
			]
		);

		
		
		
		$this->add_control(
			'progression_elements_heading_excerpt_overlay',
			[
				'label' => esc_html__( 'Ammount Raised Text', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_excerpt_typography_overlay',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-fund-raised',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_excerpt_color_overlay',
			[
				'label' => esc_html__( 'Excerpt Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-fund-raised' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_heading_meta_overlay',
			[
				'label' => esc_html__( 'Goal Text', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_meta_typography_overlay',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-funding-goal',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_meta_color_overlay',
			[
				'label' => esc_html__( 'Meta Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-funding-goal' => 'color: {{VALUE}}',
				],
			]
		);

		
		
		$this->add_control(
			'progression_elements_days_to_go',
			[
				'label' => esc_html__( 'Days To Go', 'progression-elements-funlin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_days_to_go_typography_overlay',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-index-time-remaining',
			]
		);
		
		$this->add_control(
			'progression_elements_days_to_go_border',
			[
				'label' => esc_html__( 'Days To Go Border', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-index-time-remaining' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_days_to_go_color',
			[
				'label' => esc_html__( 'Days To Go Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-index-time-remaining' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_days_to_go_icon',
			[
				'label' => esc_html__( 'Days To Go Icon', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-index-time-remaining i' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elementsdaystogo_margin',
			[
				'label' => esc_html__( 'Days To Go Margin', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-index-time-remaining' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		

	
		$this->end_controls_section();
		
		
		
		
	
		
		$this->start_controls_section(
			'section_styles_load_more_styles',
			[
				'label' => esc_html__( 'Load More Styles', 'progression-elements-funlin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		

		$this->add_control(
			'section_styles_load_more_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'progression-elements-funlin' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a span i' => 'margin-left: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_load_more_margin',
			[
				'label' => esc_html__( 'Margin', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'progression_elements_load_more_padding',
			[
				'label' => esc_html__( 'Padding', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_load_moretypography',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .infinite-nav-pro a',
			]
		);
		
		
		
		
		$this->start_controls_tabs( 'boosted_elements_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'progression-elements-funlin' ) ] );

		$this->add_control(
			'boosted_elements_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'boosted_elements_button_border_color',
			[
				'label' => esc_html__( 'Border Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'border-color: {{VALUE}};',
				],
			]
		);

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'boosted_elements_hover', [ 'label' => esc_html__( 'Hover', 'progression-elements-funlin' ) ] );

		$this->add_control(
			'boosted_elements_button_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'boosted_elements_button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'section_styles_filter_styles',
			[
				'label' => esc_html__( 'Filtering Styles', 'progression-elements-funlin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_responsive_control(
			'boosted_elements_filtering_align',
			[
				'label' => esc_html__( 'Filtering Alignment', 'progression-elements-funlin' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'progression-elements-funlin' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'progression-elements-funlin' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'progression-elements-funlin' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_control(
			'progression_elements_filter_font_color',
			[
				'label' => esc_html__( 'Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_filter_font_selected_color',
			[
				'label' => esc_html__( 'Selected Color', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li.pro-checked' => 'color: {{VALUE}}',
					'{{WRAPPER}} ul.progression-filter-button-group li:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_filter_border_color',
			[
				'label' => esc_html__( 'Default Border', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li:after' => 'background: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_filter_font_selected_border_color',
			[
				'label' => esc_html__( 'Selected Border', 'progression-elements-funlin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li.pro-checked:after' => 'background: {{VALUE}}',
					'{{WRAPPER}} ul.progression-filter-button-group li:hover:after' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_fliltering_padding',
			[
				'label' => esc_html__( 'Padding', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_fliltering_margin',
			[
				'label' => esc_html__( 'Margin', 'progression-elements-funlin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_filtering_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-funlin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ul.progression-filter-button-group li',
			]
		);
		
		$this->end_controls_section();
		
		
		
		
		
	}
	

	protected function render( ) {
		
	
	$settings = $this->get_settings();

	global $blogloop;
	global $post;
	
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	

	$post_per_page = $settings['progression_main_post_count'];
	$offset = $settings['progression_main_offset_count'];
	$offset_new = $offset + (( $paged - 1 ) * $post_per_page);
	
	
	
	if ( ! empty( $settings['progression_post_cats'] ) ) {
		$formatarray = $settings['progression_post_cats']; // get custom field value
		
		$catarray = $settings['progression_post_cats']; // get custom field value
		if($catarray >= 1 ) { 
			$catids = implode(', ', $catarray); 
		} else {
			$catids = '';
		}
		
		if($formatarray >= 1) { 
			$formatids = implode(', ', $formatarray);
         $formatidsexpand = explode(', ', $formatids);
			$formatoperator = 'IN'; 
		} else {
			$formatidsexpand = '';
			$formatoperator = 'NOT IN'; 
		}
		$operator = 'IN';
 	} else {

	 		$formatidsexpand = '';
			$operator = 'NOT IN';
 	}
	

	
 	$args = array(
 	        'post_type'         => 'product',
			  'orderby'         => $settings['progression_elements_post_order_sorting'],
			  'order'         => $settings['progression_elements_post_order'],
			  'ignore_sticky_posts' => 1,
			  'posts_per_page'     =>  $post_per_page,
			  'paged' => $paged,
			  'offset' => $offset_new,
			  'tax_query' => array(
				   array(
				 	  'taxonomy' => 'product_cat',
					  'field'    => 'slug',
					  'terms'    => $formatidsexpand,
					  'operator' => $operator
			  		)
			  ),
 	);

	$blogloop = new \WP_Query( $args );
	?>
	
	
	
	<?php if ( $settings['progression_elements_post_sorting'] == 'yes' ) : ?>
		<div class="progression-filter-button-break-wide">
			<ul class="progression-filter-button-group progression-filter-group-<?php echo esc_attr($this->get_id()); ?>">
				<?php if($settings['progression_post_cats']): ?>
					<?php
						$i = 0;

						$postIds =  $catids; // get custom field value
					    $arrayIds = explode(',', $postIds); // explode value into an array of ids
					    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
					    {
					        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
					        {
					            $arrayIds = array(); // reset array
					            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
					        }
						 }

						$args_cats = array(
						    'hide_empty'        => '0',
						    'slug'              => $arrayIds,
						); 
					
					
				
						$terms = get_terms( 'product_cat', $args_cats );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_post_filtering_text'] .'</li> ';	
		
							foreach ( $terms as $term ) {
							if ($i == 0) {
							echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li>';	
							} else if ($i > 0)  {
							echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li>';	
							}
							$i++;
							}
						}	
					?>
				<?php else : ?>
					<?php
						$i = 0;
						$terms = get_terms( 'product_cat', 'hide_empty=0' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_post_filtering_text'] .'</li> ';	
		
							foreach ( $terms as $term ) {
							if ($i == 0) {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li>';	
							} else if ($i > 0)  {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li>';	
							}
							$i++;
							}
						}	
					?>
				<?php endif ?>
			</ul>
			<div class="clearfix-pro"></div>
		</div>
	<?php endif ?>
	

	
	<div class="progression-studios-elementor-post-container">

		<div class="progression-masonry-margins">
			<div id="progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>">
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
					
				<div class="progression-masonry-item ><?php  $terms = get_the_terms( $post->ID , 'product_cat' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'product_cat' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?>
				"><!-- .progression-masonry-item -->
					<div class="progression-masonry-padding-blog">
						<div class="progression-studios-isotope-animation">
							
								<?php include(locate_template('template-parts/elementor/crowdfunding.php')); ?>
							
						</div><!-- close .progression-studios-isotope-animation -->
					</div><!-- close .progression-masonry-padding-blog -->
				</div><!-- close .progression-masonry-item -->
				<?php  endwhile; // end of the loop. ?>
			</div><!-- close #progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>  -->
		</div><!-- close .progression-masonry-margins -->
		
		<div class="clearfix-pro"></div>
		
				<div class="funlin-progression-pagination-elementor">
					<?php if ( $settings['progression_elements_post_list_pagination'] == 'default' ) : ?>
						<?php
			
						$page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page);
			
						if ( $page_tot > 1 ) {
						$big        = 999999999;
				      echo paginate_links( array(
				              'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
				              'format'    => '?paged=%#%',
				              'current'   => max( 1, $paged ),
				              'total'     => ceil(($blogloop->found_posts - $offset) / $post_per_page),
				              'prev_next' => true,
				  				'prev_text'    => esc_html__('&lsaquo; Previous', 'progression-elements-funlin'),
				  				'next_text'    => esc_html__('Next &rsaquo;', 'progression-elements-funlin'),
				              'end_size'  => 1,
				              'mid_size'  => 2,
				              'type'      => 'list'
				          )
				      );
						}
						?>
					<?php endif; ?>
					
							<?php if ( $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
			
								<?php $page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page); if ( $page_tot > 1 ) : ?>
									<div id="progression-load-more-manual">
									<div id="infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>" class="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( $settings['progression_main_post_load_more']
					. '<span><i class="far fa-arrow-alt-circle-down"></i></span>', $blogloop->max_num_pages ); ?></div></div>
									</div>
								<?php endif ?>
							<?php endif; ?>
	
							<?php if ( $settings['progression_elements_post_list_pagination'] == 'infinite-scroll' ) : ?>
								<?php $page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page); if ( $page_tot > 1 ) : ?><div id="infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>" class="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( 'Next', $blogloop->max_num_pages ); ?></div></div><?php endif ?>
							<?php endif; ?>
					
				</div>
		
	</div><!-- close .progression-studios-elementor-post-container -->
	
	<div class="clearfix-pro"></div>
	
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		
		/* Default Isotope Load Code */
		var $container<?php echo esc_attr($this->get_id()); ?> = $("#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>").isotope();
		$container<?php echo esc_attr($this->get_id()); ?>.imagesLoaded( function() {
			$(".progression-masonry-item").addClass("opacity-progression");
			$container<?php echo esc_attr($this->get_id()); ?>.isotope({
				itemSelector: "#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?> .progression-masonry-item",				
				percentPosition: true,
				layoutMode: <?php if ( ! empty( $settings['boosted_post_list_masonry'] ) ) : ?>"masonry"<?php else: ?>"fitRows"<?php endif; ?> 
	 		});
		});
		/* END Default Isotope Code */
		
		
		<?php if ( $settings['progression_elements_post_sorting'] == 'yes' ) : ?>
		$('.progression-filter-group-<?php echo esc_attr($this->get_id()); ?>').on( 'click', 'li', function() {
		  var filterValue = $(this).attr('data-filter');
		  $container<?php echo esc_attr($this->get_id()); ?>.isotope({ filter: filterValue });
		});
		
    	  $('.progression-filter-group-<?php echo esc_attr($this->get_id()); ?>').each( function( i, buttonGroup ) {
    		var $buttonGroup = $( buttonGroup );
    		$buttonGroup.on( 'click', 'li', function() {
    		  $buttonGroup.find('.pro-checked').removeClass('pro-checked');
    		  $( this ).addClass('pro-checked');
    		});
    	  });
		<?php endif ?>
		  
		  
		  
  		<?php if ( $settings['progression_elements_post_list_pagination'] == 'infinite-scroll' || $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
		
  		/* Begin Infinite Scroll */
  		$container<?php echo esc_attr($this->get_id()); ?>.infinitescroll({
  		errorCallback: function(){  $("#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
  		  navSelector  : "#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>",  
  		  nextSelector : "#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?> .nav-previous a", 
  		  itemSelector : "#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?> .progression-masonry-item", 
  	   		loading: {
  	   		 	img: "<?php echo esc_url( get_template_directory_uri() );?>/images/loader.gif",
  	   			 msgText: "",
  	   		 	finishedMsg: "<div id='no-more-posts'></div>",
  	   		 	speed: 0, }
  		  },
  		  // trigger Isotope as a callback
  		  function( newElements ) {
			  
  		     $(".video-progression-studios-format").fitVids();
			  
  		    var $newElems = $( newElements );
 	
  				$newElems.imagesLoaded(function(){
					
  				$container<?php echo esc_attr($this->get_id()); ?>.isotope( "appended", $newElems );
  				$(".progression-masonry-item").addClass("opacity-progression");
				
  			});

  		  }
  		);
  	    /* END Infinite Scroll */
  		<?php endif; ?>
		
		
  		<?php if ( $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
  		/* PAUSE FOR LOAD MORE */
  		$(window).unbind(".infscr");
  		// Resume Infinite Scroll
  		$("#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?> .nav-previous a").click(function(){
  			$container<?php echo esc_attr($this->get_id()); ?>.infinitescroll("retrieve");
  			return false;
  		});
  		/* End Infinite Scroll */
  		<?php endif; ?>
		
	});
	</script>
	

	<?php wp_reset_postdata();?>
	

	<?php
	
	}

	protected function content_template(){}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_ProgressionElementsPostList() );