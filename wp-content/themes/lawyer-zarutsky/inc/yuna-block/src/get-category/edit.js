/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps, RichText, InnerBlocks, MediaUpload, MediaUploadCheck, BlockControls, URLInput, LinkControl } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, ToggleControl, Button, ToolbarGroup, ToolbarButton, NumberControl  } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEffect, useState } from "@wordpress/element";

// беремо enum прямо з block.json
import metadata from './block.json';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
/*import '../main-block/editor.scss';*/

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { blockName, blockTitle, anchorId, topIndent, bottomIndent, btnContactText, btnContactAnchor, btnContactColor, termId, postType, perPage, pageId, selectedId, animationType, animationEasing, animationDuration, animationDelay} = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});


	// Отримуємо terms з services_tax
	const terms = useSelect(
		(select) => select('core').getEntityRecords('taxonomy', 'services_tax', { per_page: -1 }),
		[]
	);

	const options = terms
		? terms.map((term) => ({ label: term.name, value: term.id }))
		: [];

	options.unshift({ label: __('— Виберіть категорію —', 'textdomain'), value: 0 });

	// Отримуємо всі доступні пост-тайпи
	const postTypes = useSelect((select) => {
		return select('core').getPostTypes({ per_page: -1 });
	}, []);

	if (!postTypes) {
		return <p>{__('Завантаження пост-тайпів...', 'textdomain')}</p>;
	}

	// Фільтруємо тільки публічні CPT (щоб не показувати службові типи)
	const postTypeOptions = [
		{ label: __('Оберіть пост-тайп', 'textdomain'), value: '' },
		...postTypes
			.filter((pt) => pt.viewable)
			.map((pt) => ({
				label: pt.labels.singular_name,
				value: pt.slug,
			})),
	];
	// Отримуємо terms з services_tax
	const pagesList = useSelect(
		(select) => select('core').getEntityRecords('postType', 'page', { per_page: -1 }),
		[]
	);

	const pagesListOptions = pagesList
		? pagesList.map((page) => ({ label: page.title.rendered, value: page.id }))
		: [];

	pagesListOptions.unshift({ label: __('— Виберіть сторінку —', 'textdomain'), value: 0 });

	// завантажуємо опції з REST API
	const [optionsTheme, setOptionsTheme] = useState([]);
	const [loading, setLoading] = useState(true);

	useEffect(() => {
		wp.apiFetch({ path: "/lawyer-zarutsky/v1/options" })
			.then((data) => {
				if (data?.yuna_option_phone_list) {
					setOptionsTheme(data.yuna_option_phone_list);
				}
				setLoading(false);
			})
			.catch(() => setLoading(false));
	}, []);
	// отримуємо enum з block.json
	const animationOptions = metadata.attributes.animationType.enum.map((value) => ({
		label: value,
		value: value,
	}));
	// отримуємо enum з block.json
	const animationEasingOptions = metadata.attributes.animationEasing.enum.map((value) => ({
		label: value,
		value: value,
	}));

	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >
					<SelectControl
						label={__('Оберіть категорію послуг', 'textdomain')}
						value={termId}
						options={options}
						onChange={(value) => setAttributes({ termId: parseInt(value) })}
					/>
					<SelectControl
						label={__('Пост-тайп', 'textdomain')}
						value={postType}
						options={postTypeOptions}
						onChange={(value) => setAttributes({ postType: value })}
					/>
					<TextControl
						type="number"
						label={__('Кількість постів', 'myplugin')}
						value={perPage}
						onChange={(value) =>
							setAttributes({ perPage: parseInt(value) || -1 })
						}
						help={__('-1 = всі пости, 0 = жодного, або вкажіть число.', 'myplugin')}
					/>
					<SelectControl
						label={__('Оберіть ксторінкуг', 'textdomain')}
						value={pageId}
						options={pagesListOptions}
						onChange={(value) => setAttributes({ pageId: parseInt(value) })}
					/>
					{loading ? (
						<p>Завантаження...</p>
					) : (
						<SelectControl
							label="Оберіть елемент"
							value={selectedId}
							options={[
								{ label: "— Оберіть —" },
								...optionsTheme.map((item, index) => ({
									label: item.phone_number,
									value: index,
								})),
							]}
							onChange={(value) =>
								setAttributes({ selectedId: value })
							}
						/>
					)}

					<TextControl
						label={'Якір блоку'}
						value={ anchorId || ''}
						onChange={ (value)=> setAttributes({ anchorId: value })}
					/>

					<SelectControl
						label="Верхній внутрішній відступ:"
						onChange={(value) => setAttributes({topIndent: value})}
						value={attributes.topIndent}
						options={
							[
								{
									label: "Великий",
									value: "indent-top-big"
								},
								{
									label: "Малий",
									value: "indent-top-small"
								}
							]
						}
					/>
					<SelectControl
						label="Нижній внутрішній відступ:"
						onChange={(value) => setAttributes({bottomIndent: value})}
						value={attributes.bottomIndent}
						options={
							[
								{
									label: "Великий",
									value: "indent-bottom-big"
								},
								{
									label: "Малий",
									value: "indent-bottom-small"
								}
							]
						}
					/>


				</PanelBody>
				<PanelBody title={'Анімація'}  >
					<SelectControl
						label={__('Тип анімації', 'tpk')}
						value={animationType}
						options={animationOptions}
						onChange={(value) => setAttributes({ animationType: value })}
					/>
					<SelectControl
						label={__('Тип руху анімації в часі', 'tpk')}
						value={animationEasing}
						options={animationEasingOptions}
						onChange={(value) => setAttributes({ animationEasing: value })}
					/>
					<TextControl
						label={'Час анімації'}
						help={'В мілісекундах, 1секунда = 1000мілісекунд'}
						value={ animationDuration || ''}
						type={"number"}
						onChange={ (value)=> setAttributes({ animationDuration: value })}
					/>
					<TextControl
						label={'Час затримки анімації між елементами анімації'}
						help={'В мілісекундах, 1секунда = 1000мілісекунд'}
						value={ animationDelay || ''}
						type={"number"}
						onChange={ (value)=> setAttributes({ animationDelay: value })}
					/>



				</PanelBody>
				<PanelBody title={'Кнопка'}  >
					<SelectControl
						label="Колір кнопки:"
						onChange={(value) => setAttributes({btnContactColor: value})}
						value={attributes.btnContactColor}
						options={
							[
								{
									label: "Золотий",
									value: "golden-btn"
								},
								{
									label: "Прозорий",
									value: "transparent-btn"
								}
							]
						}
					/>

					<TextControl
						label={'ID якоря'}
						value={ btnContactAnchor || ''}
						onChange={ (value)=> setAttributes({ btnContactAnchor: value })}
					/>

					<TextControl
						label={'Текст кнопки'}
						value={ btnContactText || ''}
						onChange={ (value)=> setAttributes({ btnContactText: value })}
					/>

				</PanelBody>
			</InspectorControls>
			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<RichText
							tagName="h2"
							className={'block-name'}
							value={ attributes.blockName }
							placeholder={'Назва блоку'}
							onChange={ (value)=>setAttributes({ blockName: value })}
							allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
					</div>


				</div>
			</section>
		</>
	);
}
