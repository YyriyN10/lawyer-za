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
import { InspectorControls, useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, Button,  } from '@wordpress/components';
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

	const { blockText, blockTitle, btnContactText, btnContactAnchor, btnContactColor, animationType, animationEasing, animationDuration, animationDelay, backgroundImageUrl} = attributes;

	const blockProps = useBlockProps();


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
	//Select image
	const onSelectImage = (media) => {
		setAttributes({
			backgroundImageUrl: media?.url || '',
		});
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >

					{backgroundImageUrl ? (
						<img src={backgroundImageUrl} style={{ maxWidth: '50%' }} />
					) : (
						<p>Зображення не вибрано</p>
					)}

					<MediaUploadCheck>
						<MediaUpload
							onSelect={onSelectImage}
							allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
							render={({ open }) => (
								<Button onClick={open} variant="primary">
									{backgroundImageUrl ? 'Змінити зображення' : 'Завантажити зображення'}
								</Button>
							)}
						/>
					</MediaUploadCheck>
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
							tagName="h1"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'block-text'}
							value={ attributes.blockText }
							placeholder={'Текст блоку'}
							onChange={ (value)=>setAttributes({ blockText: value })}
							allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
						/>
					</div>

				</div>
			</section>
		</>
	);
}
