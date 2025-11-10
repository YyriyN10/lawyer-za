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
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEffect } from '@wordpress/element';


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes, clientId, context }) {

	const {itemName, itemDescription, itemIconUrl, itemIconId, itemIconAlt} = attributes;

	//Block index
	const { blockIndexAttr } = { blockIndexAttr: attributes.blockIndex ?? 0 };

	const index = useSelect( ( select ) => {
		const be = select( 'core/block-editor' );
		const rootId = be.getBlockRootClientId( clientId );        // батьківський блок
		const idx = be.getBlockIndex( clientId, rootId );           // 0-based індекс
		return typeof idx === 'number' ? idx : 0;
	}, [ clientId ] );

	useEffect( () => {
		if ( index !== blockIndexAttr ) {
			setAttributes( { blockIndex: index } );
		}
	}, [ index ] );

	const blockProps = useBlockProps();

	//Parent context
	const {
		['yuna/steps:btnContactColor']:  btnContactColor,
		['yuna/steps:btnContactText']:   btnContactText,
		['yuna/steps:btnContactAnchor']: btnContactAnchor,
		['yuna/steps:animationType']:    animationType,
		['yuna/steps:animationEasing']:  animationEasing,
		['yuna/steps:animationDuration']:animationDuration,
		['yuna/steps:animationDelay']:   animationDelay,
	} = context;

	//Select icon
	const onSelectImage = (media) => {
		setAttributes({
			itemIconUrl: media?.url || '',
			itemIconId: media?.id || 0,
			itemIconAlt: media?.alt || '',
		});
	};



	return (
		<>
			<div { ...blockProps } >

				<div className="image-block">
					{itemIconUrl ? (
						<img src={itemIconUrl} alt={itemIconAlt} style={{ maxWidth: '50%' }} />
					) : (
						<p>Зображення не вибрано</p>
					)}

					<MediaUploadCheck>
						<MediaUpload
							onSelect={onSelectImage}
							allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
							render={({ open }) => (
								<Button onClick={open} variant="primary">
									{itemIconUrl ? 'Змінити зображення' : 'Завантажити зображення'}
								</Button>
							)}
						/>
					</MediaUploadCheck>
				</div>

				<RichText
					tagName="p"
					className={'item-name'}
					value={ attributes.itemName }
					placeholder={'Назва блоку'}
					style={{maxWidth: '50%'}}
					onChange={ (value)=>setAttributes({ itemName: value })}
					allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
				/>
				<RichText
					tagName="p"
					className={'item-description'}
					value={ attributes.itemDescription }
					placeholder={'Кроткий опис'}
					style={{maxWidth: '50%'}}
					onChange={ (value)=>setAttributes({ itemDescription: value })}
					allowedFormats={ [ ] }
				/>
			</div>
		</>
	);
}
