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
import { InspectorControls, useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl} from '@wordpress/components';


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

	const { blockTitle, blockSubTitle, blockSubText, anchorId, topIndent, bottomIndent, btnContactText, btnContactAnchor, btnContactColor, animationType, animationEasing, animationDuration, animationDelay} = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});

	//Inner block
	const cardTemplate = [
		['yuna-blocks/step-inner',{}]
	];

	const ALLOWED_BLOCKS = [ 'yuna-blocks/step-inner'];


	// Отримуємо enum animationType з block.json
	const animationOptions = metadata.attributes.animationType.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum animationEasing з block.json
	const animationEasingOptions = metadata.attributes.animationEasing.enum.map((value) => ({
		label: value,
		value: value,
	}));

	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >

					<TextControl
						label={'Якір блоку'}
						help={'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо'}
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
						label={__('Тип анімації')}
						value={animationType}
						options={animationOptions}
						onChange={(value) => setAttributes({ animationType: value })}
					/>
					<SelectControl
						label={__('Тип руху анімації в часі')}
						value={animationEasing}
						options={animationEasingOptions}
						onChange={(value) => setAttributes({ animationEasing: value })}
					/>
					<TextControl
						label={'Час анімації'}
						help={'В мілісекундах, 1 секунда = 1000 мілісекунд'}
						value={ animationDuration || ''}
						type={"number"}
						onChange={ (value)=> setAttributes({ animationDuration: value })}
					/>
					<TextControl
						label={'Час затримки анімації між елементами анімації'}
						help={'В мілісекундах, 1 секунда = 1000 мілісекунд'}
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
						help={'ID блоку чи модального вікна на які має вести кнопка'}
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
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="h3"
							className={'block-subtitle'}
							value={ attributes.blockSubTitle }
							placeholder={'Підзаголовок блоку'}
							onChange={ (value)=>setAttributes({ blockSubTitle: value })}
							allowedFormats={ [ 'core/bold', 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'block-text'}
							value={ attributes.blockSubText }
							placeholder={'Текст блоку'}
							onChange={ (value)=>setAttributes({ blockSubText: value })}
							allowedFormats={ [ 'core/bold', ['core/link'], 'core/text-color' ] }
						/>
					</div>
					<div className="row card-list">
						<InnerBlocks
							template={ cardTemplate }
							allowedBlocks={ ALLOWED_BLOCKS }
						/>
					</div>

				</div>
			</section>
		</>
	);
}
